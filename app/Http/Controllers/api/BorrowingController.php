<?php

namespace App\Http\Controllers\api;

use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BorrowingController
{
    protected $data_title = 'pinjaman' ;
    public function index(){
        try {
            $data = Borrowing::all();

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
                'name' => 'required|string|max:255',
                'contact' => 'required|string|max:255',
                'petugas' => 'required|exists:users,id_user',
                'id_book' => 'required|exists:books,id_book',
                'borrow_date' => 'required|date',
                'return_date' => 'nullable|date|after_or_equal:borrow_date',
                'status' => 'required|in:dipinjam,dikembalikan,terlambat,hilang',
            ], [
                'name.required' => 'Nama wajib diisi',
                'contact.required' => 'Nama wajib diisi',

                'petugas.required' => 'Petugas wajib diisi',
                'petugas.exists' => 'Petugas tidak dikenal',

                'id_book.required' => 'Buku wajib diisi',
                'id_book.exists' => 'Buku tidak tersedia',

                'borrow_date.required' => 'Tanggal pinjam wajib diisi',
                'borrow_date.date' => 'Tanggal pinjam tidak valid',

                'return_date.date' => 'Tanggal kembali tidak valid',
                'return_date.after_or_equal' => 'Tanggal kembali tidak boleh sebelum tanggal pinjam',

                'status.required' => 'Status wajib diisi',
                'status.in' => 'Status tidak valid',
            ]);

            $data = Borrowing::create([
                'petugas' => $validated['petugas'],
                'id_book' => $validated['id_book'],
                'borrow_date' => $validated['borrow_date'],
                'return_date' => $validated['return_date'] ?? null,
                'status' => $validated['status'],
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
        $data = Borrowing::find($id);
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

    public function update(Request $request, $id){
        try {
            $data = Borrowing::where('id_borrowing', $id)->firstOrFail();

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'contact' => 'required|string|max:255',
                'petugas' => 'required|exists:users,id_user',
                'id_book' => 'required|exists:books,id_book',
                'borrow_date' => 'required|date',
                'return_date' => 'nullable|date|after_or_equal:borrow_date',
                'status' => 'required|in:dipinjam,dikembalikan,terlambat,hilang',
            ], [
                'name.required' => 'Nama wajib diisi',
                'contact.required' => 'Nama wajib diisi',

                'petugas.required' => 'Petugas wajib diisi',
                'petugas.exists' => 'Petugas tidak dikenal',

                'id_book.required' => 'Buku wajib diisi',
                'id_book.exists' => 'Buku tidak tersedia',

                'borrow_date.required' => 'Tanggal pinjam wajib diisi',
                'borrow_date.date' => 'Tanggal pinjam tidak valid',

                'return_date.date' => 'Tanggal kembali tidak valid',
                'return_date.after_or_equal' => 'Tanggal kembali tidak boleh sebelum tanggal pinjam',

                'status.required' => 'Status wajib diisi',
                'status.in' => 'Status tidak valid',
            ]);

            $data->update([
                'petugas' => $validated['petugas'],
                'id_book' => $validated['id_book'],
                'borrow_date' => $validated['borrow_date'],
                'return_date' => $validated['return_date'] ?? null,
                'status' => $validated['status'],
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
        $data = Borrowing::find($id);
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
