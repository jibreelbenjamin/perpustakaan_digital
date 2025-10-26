<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowingController
{
    protected $base_url;
    public function __construct(){
        $this->base_url = env('API_BASE_URL');;
    }
    
    public function index(Request $request){
        try {
            $response = (new Client())->get("{$this->base_url}/borrow", [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
            $pinjaman = json_decode($response->getBody(), true)['data'] ?? [];

            return view('pinjaman.daftar', [
                'total' => count($pinjaman),
                'pinjaman' => $pinjaman,
            ]);

        } catch (ClientException $e) {
            return view('pinjaman.daftar', [
                'total' => 0,
                'pinjaman' => [],
                'error' => 'Gagal memuat data: ' . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return view('pinjaman.daftar', [
                'total' => 0,
                'pinjaman' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

    public function add(Request $request){
        $id_user = Auth::user()->id_user;
        $token = session('token') ?? null;

        $data = [
            'petugas' => $id_user,
            'name' => $request->name,
            'contact' => $request->contact ?? null,
            'id_book' => $request->id_book,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date ?? null,
            'status' => $request->status,
        ];

        try {
            $client = new Client();
            $response = $client->post('https://perpustakaan_digital.test/api/borrow', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                    'Accept' => 'application/json',
                ],
                'form_params' => $data
            ]);

            $body = json_decode($response->getBody(), true);

            if (isset($body['status']) && $body['status'] === false) {
                return response()->json([
                    'status' => false,
                    'message' => $body['message'] ?? 'Validasi gagal',
                    'errors' => $body['errors'] ?? [],
                ]);
            }


            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $body
            ]);
        } catch (ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody(), true);
            return response()->json([
                'status' => false,
                'message' => $responseBody['message'] ?? 'Terjadi kesalahan dari API',
                'errors' => $responseBody['errors'] ?? [],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan. coba lagi',
                'error_detail' => $e->getMessage(),
            ]);
        }
    }

    public function show($id){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . session('token'),
        ];

        $urlBook = "{$this->base_url}/book";
        $urlCategory = "{$this->base_url}/category";
        $urlBorrow = "{$this->base_url}/borrow/{$id}";

        $promises = [
            'book' => $client->getAsync($urlBook, ['headers' => $headers]),
            'category' => $client->getAsync($urlCategory, ['headers' => $headers]),
            'borrow' => $client->getAsync($urlBorrow, ['headers' => $headers]),
        ];

        try {
            $responses = Utils::unwrap($promises);

            $buku = data_get(json_decode($responses['book']->getBody(), true), 'data', []);
            $kategori = data_get(json_decode($responses['category']->getBody(), true), 'data', []);
            $pinjaman = data_get(json_decode($responses['borrow']->getBody(), true), 'data', null);

            if (!$pinjaman) {
                return view('pinjaman.detail', [
                    'total' => 0,
                    'pinjaman' => [],
                    'error' => 'Data pinjaman tidak ditemukan.',
                ]);
            }

            $urlPetugas = "{$this->base_url}/users/{$pinjaman['petugas']}";
            try {
                $responsePetugas = $client->get($urlPetugas, ['headers' => $headers]);
                $petugasData = data_get(json_decode($responsePetugas->getBody(), true), 'data', null);
            } catch (\Exception $e) {
                $petugasData = null;
            }

            $bukuIndexed = collect($buku)->keyBy('id_book');
            $kategoriIndexed = collect($kategori)->keyBy('id_category');

            $bukuPinjaman = $bukuIndexed[$pinjaman['id_book']] ?? null;
            if ($bukuPinjaman && isset($bukuPinjaman['id_category'])) {
                $bukuPinjaman['kategori'] = $kategoriIndexed[$bukuPinjaman['id_category']] ?? null;
            }

            $pinjaman['buku'] = $bukuPinjaman;
            $pinjaman['petugas'] = $petugasData;

            return view('pinjaman.detail', [
                'total' => 1,
                'pinjaman' => $pinjaman,
            ]);

        } catch (ClientException $e) {
            return view('pinjaman.detail', [
                'total' => 0,
                'pinjaman' => [],
                'error' => 'Gagal memuat data: ' . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return view('pinjaman.detail', [
                'total' => 0,
                'pinjaman' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request, $id){
        $id_user = Auth::user()->id_user;
        $token = session('token') ?? null;

        $data = [
            'petugas' => $id_user,
            'name' => $request->name,
            'contact' => $request->contact ?? null,
            'id_book' => $request->id_book,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date ?? null,
            'status' => $request->status,
        ];

        try {
            $client = new Client();
            $response = $client->put("https://perpustakaan_digital.test/api/borrow/{$id}", [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
                'form_params' => $data
            ]);

            $body = json_decode($response->getBody(), true);

            if (isset($body['status']) && $body['status'] === false) {
                return response()->json([
                    'status' => false,
                    'message' => $body['message'] ?? 'Validasi gagal',
                    'errors' => $body['errors'] ?? [],
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $body
            ]);

        } catch (ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody(), true);
            return response()->json([
                'status' => false,
                'message' => $responseBody['message'] ?? 'Terjadi kesalahan dari API',
                'errors' => $responseBody['errors'] ?? [],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan. Coba lagi',
                'error_detail' => $e->getMessage(),
            ]);
        }
    }

    public function markAs(Request $request, $id){
        $id_user = Auth::user()->id_user;
        $token = session('token') ?? null;

        $data = [
            'status' => $request->status,
        ];

        try {
            $client = new Client();
            $response = $client->patch("https://perpustakaan_digital.test/api/borrow/{$id}", [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
                'form_params' => $data
            ]);

            $body = json_decode($response->getBody(), true);

            if (isset($body['status']) && $body['status'] === false) {
                return back()->withErrors(['message' => 'Data pinjaman tidak ditemukan']);
            }

            return back()->with('successToast', 'Data pinjaman telah ditandai');
        } catch (ClientException $e) {
            return back()->withErrors(['message' => 'Gagal memuat data: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Terjadi kesalahan:' . $e->getMessage()]);
        }
    }

    public function destroy(Request $request){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . session('token'),
        ];

        $urlBorrow = "{$this->base_url}/borrow/{$request->id}";

        $promises = [
            'borrow' => $client->getAsync($urlBorrow, ['headers' => $headers]),
        ];

        try {
            $responses = Utils::unwrap($promises);
            $pinjaman = data_get(json_decode($responses['borrow']->getBody(), true), 'data', null);

            if (!$pinjaman) {
                return back()->withErrors(['message' => 'Data pinjaman tidak ditemukan']);
            }
            
            if($client->request('DELETE', $urlBorrow, ['headers' => $headers])){
                return redirect()->route('daftar.pinjaman')->with('successToast', 'Data berhasil dihapus');
            } else {
                return back()->withErrors(['message' => 'Terjadi kesalahan saat menghapus']);
            }

        } catch (ClientException $e) {
            return back()->withErrors(['message' => 'Gagal memuat data: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Terjadi kesalahan:' . $e->getMessage()]);
        }
    }

    public function loadData(Request $request){
        $offset = (int) $request->query('offset', 0);
        $limit = (int) $request->query('limit', 10);
        $search = $request->query('search', null);

        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . session('token'),
        ];

        try {
            $responses = Utils::unwrap([
                'book' => $client->getAsync("{$this->base_url}/book", ['headers' => $headers]),
                'borrow' => $client->getAsync("{$this->base_url}/borrow", ['headers' => $headers]),
            ]);

            $buku = json_decode($responses['book']->getBody(), true)['data'] ?? [];
            $pinjamanRaw = json_decode($responses['borrow']->getBody(), true)['data'] ?? [];

            $bukuIndexed = collect($buku)->keyBy('id_book');

            // Gabungkan data pinjaman + buku
            $pinjaman = collect($pinjamanRaw)
                ->map(function ($item) use ($bukuIndexed) {
                    $item['buku'] = $bukuIndexed[$item['id_book']] ?? null;
                    return $item;
                });

            // Fungsi bantu untuk flatten array menjadi string
            $flattenToString = function ($data) use (&$flattenToString) {
                if (is_array($data)) {
                    return implode(' ', array_map($flattenToString, $data));
                }
                return (string) $data;
            };

            // Filter berdasarkan $search (cari di data pinjaman & buku)
            if ($search) {
                $search = strtolower($search);
                $pinjaman = $pinjaman->filter(function ($item) use ($search, $flattenToString) {
                    $borrowCombined = strtolower($flattenToString($item));
                    $bookCombined = isset($item['buku']) ? strtolower($flattenToString($item['buku'])) : '';
                    return str_contains($borrowCombined, $search) || str_contains($bookCombined, $search);
                });
            }

            // Pagination + urutan
            $pinjaman = $pinjaman
                ->reverse()
                ->slice($offset, $limit)
                ->values();

            return response()->json($pinjaman, 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat mengambil data pinjaman.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
