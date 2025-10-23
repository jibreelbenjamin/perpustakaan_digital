<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    protected $base_url = "https://perpustakaan_digital.test/api";
    public function home(){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . session('token'),
        ];
        $urlUser = "{$this->base_url}/users";
        $urlBook = "{$this->base_url}/book";
        $urlCategory = "{$this->base_url}/category";
        $urlBorrow = "{$this->base_url}/borrow";

        $promises = [
            'user' => $client->getAsync($urlUser, ['headers' => $headers]),
            'book' => $client->getAsync($urlBook, ['headers' => $headers]),
            'category' => $client->getAsync($urlCategory, ['headers' => $headers]),
            'borrow' => $client->getAsync($urlBorrow, ['headers' => $headers]),
        ];
        
        try {
            $responses = Utils::unwrap($promises);

            $petugas = json_decode($responses['user']->getBody(), true)['data'] ?? [];
            $buku = json_decode($responses['book']->getBody(), true)['data'] ?? [];
            $kategori = json_decode($responses['category']->getBody(), true)['data'] ?? [];
            $pinjamanRaw = json_decode($responses['borrow']->getBody(), true)['data'] ?? [];

            if (!is_array($pinjamanRaw)) $pinjamanRaw = [];

            $bukuDipinjam = array_filter($pinjamanRaw, fn($item) => ($item['status'] ?? '') === 'dipinjam');
            $bukuHilang = array_filter($pinjamanRaw, fn($item) => ($item['status'] ?? '') === 'hilang');
            $bukuDikembalikan = array_filter($pinjamanRaw, fn($item) => ($item['status'] ?? '') === 'dikembalikan');

            $bukuIndexed = collect($buku)->keyBy('id_book');
            $pinjaman = collect($pinjamanRaw)->map(function ($item) use ($bukuIndexed) {
                $item['buku'] = $bukuIndexed[$item['id_book']] ?? null;
                return $item;
            });

            return view('home', compact(
                'petugas',
                'buku',
                'kategori',
                'pinjaman',
                'bukuDipinjam',
                'bukuHilang',
                'bukuDikembalikan'
            ));
        } catch (ClientException $e) {
            return view('home', [
                'petugas' => [],
                'buku' => [],
                'kategori' => [],
                'pinjaman' => [],
                'bukuDipinjam' => [],
                'bukuHilang' => [],
                'bukuDikembalikan' => [],
                'error' => 'Gagal memuat data: ' . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return view('home', [
                'petugas' => [],
                'buku' => [],
                'kategori' => [],
                'pinjaman' => [],
                'bukuDipinjam' => [],
                'bukuHilang' => [],
                'bukuDikembalikan' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }
}
