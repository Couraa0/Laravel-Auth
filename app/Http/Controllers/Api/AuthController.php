<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    // Fungsi Register (Daftar Akun)
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi Password
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Register Berhasil!',
            'data' => $user,
        ]);
    }
    // Fungsi Login (Masuk dan Dapatkan Token)
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        // Pengecekan email dan password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Email atau Password salah!',
                ],
                401,
            );
        }
        // Generate Token Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'Login Berhasil!',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    // Fungsi Logout (Hapus Token)
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Logout Berhasil!',
        ]);
    }
}
