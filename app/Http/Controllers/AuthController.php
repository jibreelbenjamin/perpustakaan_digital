<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    protected $base_url = "https://perpustakaan_digital.test/api";
    public function loginForm(){
        if(Auth::check()){
            return redirect()->route('home');
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $client = new Client();
        $url = "{$this->base_url}/login";

        try {
            $response = $client->request('POST', $url, [
                'form_params' => [
                    'username' => $request->username,
                    'password' => $request->password,
                ],
                'http_errors' => false
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['status']) && $data['status'] === true) {
                $user = User::where('username', $data['username'])->first();

                if (!$user) {
                    $user = User::create([
                        'id_user' => $data['id'],
                        'name' => $data['name'],
                        'username' => $data['username'],
                        'role' => $data['role'],
                        'password' => bcrypt($request->password),
                    ]);
                }

                Auth::login($user, $request->filled('remember'));

                session(['token' => $data['access_token'] ?? null]);

                return redirect()->route('home')->with('successToast', 'Selamat datang!');
            } else {
                return back()->withInput()->withErrors([
                    'message' => 'Username atau password salah.',
                ]);
            }
        } catch (\Exception $e) {
            return back()->withErrors([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ]);
        }
    }

    public function logout(Request $request){
        $client = new Client();
        $url = "{$this->base_url}/logout";

        if (Auth::check()) {
            try {
                $token = session('token');

                $response = $client->request('POST', $url, [
                    'headers' => [
                        'Authorization' => "Bearer {$token}",
                    ],
                    'http_errors' => false,
                ]);

                Auth::logout();
                $request->session()->forget('token');
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->with('successToast', 'Anda telah logout.');
            } catch (\Exception $e) {
                return back()->withErrors(['message' => 'Gagal logout: ' . $e->getMessage()]);
            }
        } else {
            return redirect()->route('login');
        }
    }

}
