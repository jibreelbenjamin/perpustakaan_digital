<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController
{
    protected $base_url;
    public function __construct(){
        $this->base_url = env('API_BASE_URL');;
    }
    
    public function index(Request $request){
        try {
            $response = (new Client())->get("{$this->base_url}/category", [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
            $kategori = json_decode($response->getBody(), true)['data'] ?? [];

            return view('kategori.daftar', [
                'total' => count($kategori),
                'kategori' => $kategori,
            ]);

        } catch (ClientException $e) {
            return view('kategori.daftar', [
                'total' => 0,
                'kategori' => [],
                'error' => 'Gagal memuat data: ' . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return view('kategori.daftar', [
                'total' => 0,
                'kategori' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

    public function add(Request $request){
        $token = session('token') ?? null;

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        try {
            $client = new Client();
            $response = $client->post('https://perpustakaan_digital.test/api/category', [
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

        $promises = [
            'book' => $client->getAsync($urlBook, ['headers' => $headers]),
            'category' => $client->getAsync($urlCategory, ['headers' => $headers]),
        ];

        try {
            $responses = Utils::unwrap($promises);

            $buku = data_get(json_decode($responses['book']->getBody(), true), 'data', []);
            $kategori = data_get(json_decode($responses['category']->getBody(), true), 'data', []);

            $bukuCollection = collect($buku);
            $kategoriCollection = collect($kategori);

            $kategoriDetail = $kategoriCollection->firstWhere('id_category', $id);

            if (!$kategoriDetail) {
                return view('kategori.detail', [
                    'kategori' => null,
                    'error' => 'Kategori tidak ditemukan.',
                ]);
            }

            $totalBuku = $bukuCollection->where('id_category', $id)->count();

            $kategoriDetail['total_buku'] = $totalBuku;

            $kategoriDetail['buku_list'] = $bukuCollection
                ->where('id_category', $id)
                ->values();

            return view('kategori.detail', [
                'kategori' => $kategoriDetail,
            ]);

        } catch (ClientException $e) {
            return view('kategori.detail', [
                'kategori' => null,
                'error' => 'Gagal memuat data: ' . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return view('kategori.detail', [
                'kategori' => null,
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request, $id){
        $token = session('token') ?? null;

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        try {
            $client = new Client();
            $response = $client->put("https://perpustakaan_digital.test/api/category/{$id}", [
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

    public function destroy(Request $request){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . session('token'),
        ];

        $urlBook = "{$this->base_url}/category/{$request->id}";

        $promises = [
            'category' => $client->getAsync($urlBook, ['headers' => $headers]),
        ];

        try {
            $responses = Utils::unwrap($promises);
            $kategori = data_get(json_decode($responses['category']->getBody(), true), 'data', null);

            if (!$kategori) {
                return back()->withErrors(['message' => 'Kategori tidak ditemukan']);
            }
            
            if($client->request('DELETE', $urlBook, ['headers' => $headers])){
                return redirect()->route('daftar.kategori')->with('successToast', 'Kategori berhasil dihapus');
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
                'category' => $client->getAsync("{$this->base_url}/category", ['headers' => $headers]),
            ]);

            $kategori = json_decode($responses['category']->getBody(), true)['data'] ?? [];

            $kategori = collect($kategori);

            $flattenToString = function ($array) {
                return collect($array)->flatten()->implode(' ');
            };

            if ($search) {
                $search = strtolower($search);
                $kategori = $kategori->filter(function ($item) use ($search, $flattenToString) {
                    $categoryCombined = strtolower($flattenToString($item));
                    return str_contains($categoryCombined, $search);
                });
            }

            $kategori = $kategori
                ->reverse()
                ->slice($offset, $limit)
                ->values();

            return response()->json($kategori, 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat mengambil data kategori.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
