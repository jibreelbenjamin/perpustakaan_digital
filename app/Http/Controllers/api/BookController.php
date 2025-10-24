<?php

namespace App\Http\Controllers\api;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController
{
    protected $data_title = 'buku' ;
    public function index(){
        try {
            $data = Book::all();

            if ($data->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data '.$this->data_title.' tidak tersedia',
                    'data' => [],
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data '.$this->data_title.' ditemukan',
                'data' => $data,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request){
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'publisher' => 'nullable|string|max:255',
                'year' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
                'id_category' => 'required|exists:categories,id_category',
                'stock' => 'nullable|integer|min:0',
            ], [
                'title.required' => 'Judul buku wajib diisi',
                'title.max' => 'Judul buku maksimal 255 karakter',
                'author.required' => 'Nama penulis wajib diisi',
                'author.max' => 'Nama penulis maksimal 255 karakter',
                'publisher.max' => 'Nama penerbit maksimal 255 karakter',
                'year.digits' => 'Tahun harus terdiri dari 4 angka',
                'year.integer' => 'Tahun harus berupa angka',
                'year.min' => 'Tahun tidak boleh kurang dari 1900',
                'year.max' => 'Tahun tidak boleh melebihi tahun sekarang',
                'id_category.required' => 'Kategori wajib dipilih',
                'id_category.exists' => 'Kategori tidak tersedia',
                'stock.integer' => 'Stok harus berupa angka',
                'stock.min' => 'Stok minimal bernilai 0',
            ]);


            $data = Book::create([
                'title' => $validated['title'],
                'author' => $validated['author'],
                'publisher' => $validated['publisher'] ?? null,
                'year' => $validated['year'] ?? null,
                'id_category' => $validated['id_category'],
                'stock' => $validated['stock'] ?? 0,
            ]);

            if (!$data) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data '.$this->data_title.' gagal dibuat'
                ], 500);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data '.$this->data_title.' berhasil dibuat',
                'data' => $data
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi '.$this->data_title.' gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id){
        $data = Book::find($id);
        if($data){
            return response()->json([
                'status' => true,
                'message' => 'Data '.$this->data_title.' ditemukan',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data '.$this->data_title.' tidak tersedia'
            ]);
        }
    }

    public function search(Request $request){
        try {
            $query = $request->query('search');

            $data = Book::when($query, function ($qBuilder) use ($query) {
                $qBuilder->where('title', 'like', '%' . $query . '%');
            })->get();

            if ($data->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => $query 
                        ? 'Tidak ada buku yang cocok dengan kata kunci "' . $query . '".'
                        : 'Tidak ada data buku yang tersedia.',
                    'data' => [],
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => $query
                    ? 'Hasil pencarian buku ditemukan.'
                    : 'Data buku ditemukan.',
                'total' => $data->count(),
                'data' => $data,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat mengambil data buku.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id){
        try {
            $data = Book::where('id_book', $id)->firstOrFail();

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'publisher' => 'nullable|string|max:255',
                'year' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
                'id_category' => 'required|exists:categories,id_category',
                'stock' => 'nullable|integer|min:0',
            ], [
                'title.required' => 'Judul buku wajib diisi',
                'title.max' => 'Judul buku maksimal 255 karakter',
                'author.required' => 'Nama penulis wajib diisi',
                'author.max' => 'Nama penulis maksimal 255 karakter',
                'publisher.max' => 'Nama penerbit maksimal 255 karakter',
                'year.digits' => 'Tahun harus terdiri dari 4 angka',
                'year.integer' => 'Tahun harus berupa angka',
                'year.min' => 'Tahun tidak boleh kurang dari 1900',
                'year.max' => 'Tahun tidak boleh melebihi tahun sekarang',
                'id_category.required' => 'Kategori wajib dipilih',
                'id_category.exists' => 'Kategori tidak tersedia',
                'stock.integer' => 'Stok harus berupa angka',
                'stock.min' => 'Stok minimal bernilai 0',
            ]);

            $data->update([
                'title' => $validated['title'],
                'author' => $validated['author'],
                'publisher' => $validated['publisher'] ?? null,
                'year' => $validated['year'] ?? null,
                'id_category' => $validated['id_category'],
                'stock' => $validated['stock'] ?? 0,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data '.$this->data_title.' berhasil diupdate',
                'data' => $data
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data '.$this->data_title.' tidak ditemukan'
            ], 404);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi '.$this->data_title.' gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id){
        $data = Book::find($id);
        if(empty($data)){
            return response()->json([
                'status' => false,
                'message' => 'Data '.$this->data_title.' tidak tersedia'
            ]);
        }
        
        try {
            $post = $data->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data '.$this->data_title.' berhasil dihapus',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
