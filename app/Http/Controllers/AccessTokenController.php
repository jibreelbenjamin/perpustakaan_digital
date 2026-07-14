<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AccessTokenController
{
    protected $base_url;
    public function __construct(){
        $this->base_url = env('API_BASE_URL');;
    }
    
    public function index(Request $request){
        try {
            $response = (new Client())->get("{$this->base_url}/access_token", [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
            $akses_token = json_decode($response->getBody(), true)['data'] ?? [];

            return view('akses_token.daftar', [
                'total' => count($akses_token),
                'akses_token' => $akses_token,
            ]);

        } catch (ClientException $e) {
            return view('akses_token.daftar', [
                'total' => 0,
                'akses_token' => [],
                'error' => 'Gagal memuat data: ' . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return view('akses_token.daftar', [
                'total' => 0,
                'akses_token' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

    public function show($id){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . session('token'),
        ];

        $urlAccessToken = "{$this->base_url}/access_token/{$id}";

        $promises = [
            'access_token' => $client->getAsync($urlAccessToken, ['headers' => $headers]),
        ];

        try {
            $responses = Utils::unwrap($promises);

            $access_token = json_decode($responses['access_token']->getBody(), true)['data'];

            if (!$access_token) {
                return view('akses_token.detail', [
                    'akses_token' => null,
                    'error' => 'Akses token tidak ditemukan.',
                ]);
            }

            return view('akses_token.detail', [
                'akses_token' => $access_token,
            ]);

        } catch (ClientException $e) {
            return view('akses_token.detail', [
                'akses_token' => null,
                'error' => 'Gagal memuat data: ' . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return view('akses_token.detail', [
                'akses_token' => null,
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

    public function revoke(Request $request){
        $token = session('token') ?? null;

        try {
            $client = new Client();
            $response = $client->patch("{$this->base_url}/access_token/{$request->id}", [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);

            $body = json_decode($response->getBody(), true);

            if (isset($body['status']) && $body['status'] === false) {
                return back()->withErrors(['message' => 'Data akses token tidak ditemukan']);
            }

            return back()->with('successToast', 'Data akses token telah dicabut');
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
                'access_token' => $client->getAsync("{$this->base_url}/access_token", ['headers' => $headers]),
            ]);

            $akses_token = json_decode($responses['access_token']->getBody(), true)['data'] ?? [];

            $akses_token = collect($akses_token);

            $flattenToString = function ($array) {
                return collect($array)->flatten()->implode(' ');
            };

            if ($search) {
                $search = strtolower($search);
                $akses_token = $akses_token->filter(function ($item) use ($search, $flattenToString) {
                    $categoryCombined = strtolower($flattenToString($item));
                    return str_contains($categoryCombined, $search);
                });
            }

            $akses_token = $akses_token
                ->reverse()
                ->slice($offset, $limit)
                ->values();

            return response()->json($akses_token, 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat mengambil data akses token.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
