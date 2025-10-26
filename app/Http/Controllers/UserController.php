<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
    protected $base_url;
    public function __construct(){
        $this->base_url = env('API_BASE_URL');;
    }
    
    public function index(Request $request){
        try {
            $response = (new Client())->get("{$this->base_url}/users", [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
            $user = json_decode($response->getBody(), true)['data'] ?? [];

            return view('user.daftar', [
                'total' => count($user),
                'user' => $user,
            ]);

        } catch (ClientException $e) {
            return view('user.daftar', [
                'total' => 0,
                'user' => [],
                'error' => 'Gagal memuat data: ' . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return view('user.daftar', [
                'total' => 0,
                'user' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

    public function add(Request $request){
        $token = session('token') ?? null;

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
            'phone' => $request->phone,
        ];

        try {
            $client = new Client();
            $response = $client->post("{$this->base_url}/users", [
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

        $urlUser = "{$this->base_url}/users";
        $urlBorrow = "{$this->base_url}/borrow";

        $promises = [
            'user' => $client->getAsync($urlUser, ['headers' => $headers]),
            'borrow' => $client->getAsync($urlBorrow, ['headers' => $headers]),
        ];

        try {
            $responses = Utils::unwrap($promises);

            $users = data_get(json_decode($responses['user']->getBody(), true), 'data', []);
            $pinjaman = data_get(json_decode($responses['borrow']->getBody(), true), 'data', []);

            $userCollection = collect($users);
            $pinjamanCollection = collect($pinjaman);

            $userDetail = $userCollection->firstWhere('id_user', $id);

            if (!$userDetail) {
                return view('user.detail', [
                    'user' => null,
                    'error' => 'Data user tidak ditemukan.',
                ]);
            }

            $totalPinjaman = $pinjamanCollection->where('petugas', $id)->count();
            $userDetail['total_pinjaman'] = $totalPinjaman;

            return view('user.detail', [
                'user' => $userDetail,
            ]);

        } catch (ClientException $e) {
            return view('user.detail', [
                'user' => null,
                'error' => 'Gagal memuat data: ' . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return view('user.detail', [
                'user' => null,
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request, $id){
        $token = session('token') ?? null;

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'phone' => $request->phone,
        ];

        try {
            $client = new Client();
            $response = $client->put("{$this->base_url}/users/{$id}", [
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

    public function updatePassword(Request $request, $id){
        $token = session('token') ?? null;

        $data = [
            'current_password' => $request->current_password,
            'new_password' => $request->new_password,
            'new_password_confirmation' => $request->new_password_confirmation,
        ];

        if(Auth::user()->id_user != $id){
            return response()->json([
                'status' => false,
                'message' => 'Akun tidak sesuai',
                'errors' => [],
            ]);
        }

        try {
            $client = new Client();
            $response = $client->put("{$this->base_url}/users/{$id}/password", [
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
                'message' => 'Password berhasil diperbarui',
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

        $urlUser = "{$this->base_url}/users/{$request->id}";

        $promises = [
            'users' => $client->getAsync($urlUser, ['headers' => $headers]),
        ];

        try {
            $responses = Utils::unwrap($promises);
            $pinjaman = data_get(json_decode($responses['users']->getBody(), true), 'data', null);

            if (!$pinjaman) {
                return back()->withErrors(['message' => 'Petugas pinjaman tidak ditemukan']);
            }
            
            if($client->request('DELETE', $urlUser, ['headers' => $headers])){
                return redirect()->route('daftar.user')->with('successToast', 'Petugas berhasil dihapus');
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
                'users' => $client->getAsync("{$this->base_url}/users", ['headers' => $headers]),
            ]);

            $user = json_decode($responses['users']->getBody(), true)['data'] ?? [];

            $user = collect($user);

            $flattenToString = function ($array) {
                return collect($array)->flatten()->implode(' ');
            };

            if ($search) {
                $search = strtolower($search);
                $user = $user->filter(function ($item) use ($search, $flattenToString) {
                    $bookCombined = strtolower($flattenToString($item));
                    return str_contains($bookCombined, $search);
                });
            }

            $user = $user
                ->reverse()
                ->slice($offset, $limit)
                ->values();

            return response()->json($user, 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat mengambil data user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
