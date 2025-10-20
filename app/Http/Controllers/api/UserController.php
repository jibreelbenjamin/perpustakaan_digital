<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class UserController 
{
    public function index(){
        try {
            $users = User::all();

            if ($users->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Belum ada user terdaftar.',
                    'data' => [],
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Daftar user berhasil diambil.',
                'data' => $users,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request){
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username',
                'password' => 'required|string|min:6',
                'role' => 'nullable|in:admin,moderator,staff',
                'phone' => 'nullable|regex:/^[0-9]+$/|digits_between:12,15',
            ], [
                'name.required' => 'Nama wajib diisi.',
                'username.required' => 'Username wajib diisi.',
                'username.unique' => 'Username sudah digunakan.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 6 karakter.',
                'role.in' => 'Role tidak valid.',
                'phone.regex' => 'No Telp tidak valid',
                'phone.digits_between' => 'No Telp tidak valid',
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'username' => $validated['username'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'] ?? 'staff',
                'phone' => $validated['phone'] ?? null,
            ]);

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal membuat user, silakan coba lagi.'
                ], 500);
            }

            return response()->json([
                'status' => true,
                'message' => 'User berhasil didaftarkan.',
                'user' => $user
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function search($id){
        $data = User::find($id);
        if($data){
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak tersedia'
            ]);
        }
    }

    public function update(Request $request, $id){
        try {
            $user = User::where('id_user', $id)->firstOrFail();

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,' . $user->id_user . ',id_user',
                'phone' => 'nullable|regex:/^[0-9]+$/|digits_between:12,15',
                'password_auth' => 'required|string',
            ], [
                'name.required' => 'Nama wajib diisi.',
                'username.required' => 'Username wajib diisi.',
                'username.unique' => 'Username sudah digunakan.',
                'phone.regex' => 'No Telp tidak valid',
                'phone.digits_between' => 'No Telp tidak valid',
                'password_auth.required' => 'Password akun harus diisi'
            ]);

            if (!Hash::check($validated['password_auth'], $user->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Password akun salah.'
                ], 400);
            }

            $user->update([
                'name' => $validated['name'],
                'username' => $validated['username'],
                'phone' => $validated['phone'],
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User berhasil diupdate.',
                'user' => $user
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'User tidak ditemukan.'
            ], 404);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateRole(Request $request, $id){
        try {
            $user = User::where('id_user', $id)->firstOrFail();

            $validated = $request->validate([
                'role' => 'required|in:admin,moderator,staff',
            ], [
                'role.required' => 'Role wajib diisi.',
                'role.in' => 'Role tidak valid.',
            ]);

            $user->update([
                'role' => $validated['role'],
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Role user berhasil diupdate.',
                'user' => $user
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'User tidak ditemukan.'
            ], 404);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updatePassword(Request $request, $id){
        try {
            $user = User::where('id_user', $id)->firstOrFail();

            $validated = $request->validate([
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:6|confirmed',
            ], [
                'current_password.required' => 'Password lama wajib diisi.',
                'new_password.required' => 'Password baru wajib diisi.',
                'new_password.min' => 'Password baru minimal 6 karakter.',
                'new_password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]);

            if (!Hash::check($validated['current_password'], $user->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Password lama salah.'
                ], 400);
            }

            $user->update([
                'password' => Hash::make($validated['new_password']),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Password berhasil diubah.'
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'User tidak ditemukan.'
            ], 404);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id){
        $data = User::find($id);
        if(empty($data)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak tersedia'
            ]);
        }
        
        try {
            $post = $data->delete();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil hapus data',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}