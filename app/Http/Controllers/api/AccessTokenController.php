<?php

namespace App\Http\Controllers\api;

use Carbon\Carbon;
use App\Models\AccessToken;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Sanctum\PersonalAccessToken as SanctumAccessToken;
use Exception;

class AccessTokenController
{
    protected $data_title = 'akses token' ;
    public function index(){
        try {
            $data = SanctumAccessToken::with('tokenable')->get();

            if ($data->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data ' . $this->data_title . ' tidak tersedia',
                    'data' => [],
                ], 404);
            }

            $data = $data->map(function ($item) {
                $expiresAt = $item->expires_at ? Carbon::parse($item->expires_at) : null;

                if($item->token != 'null'){
                    $status = $expiresAt && $expiresAt->isFuture()
                        ? 'aktif'
                        : 'kadaluarsa';
                } 

                $item->status = $status;
                
                $item->user = $item->tokenable ? [
                    'id_user' => $item->tokenable->id_user ?? null,
                    'name' => $item->tokenable->name ?? null,
                    'username' => $item->tokenable->username ?? null,
                    'role' => $item->tokenable->role ?? null,
                ] : null;

                return $item;
            });

            return response()->json([
                'status' => true,
                'message' => 'Data ' . $this->data_title . ' ditemukan',
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

    public function show($id){
        $data = SanctumAccessToken::with('tokenable')->find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data '.$this->data_title.' tidak ditemukan',
            ], 404);
        }

        $user = $data->tokenable;

        return response()->json([
            'status' => true,
            'message' => 'Data '.$this->data_title.' ditemukan',
            'data' => [
                'token_id' => $data->id,
                'name' => $data->name,
                'abilities' => $data->abilities,
                'last_used_at' => $data->last_used_at,
                'created_at' => $data->created_at,
                'expires_at' => $data->expires_at,
                'status' => $data->expires_at && $data->expires_at->isFuture() ? 'aktif' : 'kadaluarsa',
                'user' => $user ? [
                    'id_user' => $user->id_user,
                    'name' => $user->name,
                    'username' => $user->username,
                    'role' => $user->role,
                ] : null,
            ],
        ]);

    }

    public function revoke($id){
        try {
            $data = AccessToken::where('id', $id)->firstOrFail();

            $data->update([
                'expires_at' => now(),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Akses token berhasil dicabut',
                'data' => $data
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data akses token tidak ditemukan'
            ], 404);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
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
        $data = SanctumAccessToken::find($id);
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
