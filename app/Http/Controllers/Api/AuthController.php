<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'message' => 'Register berhasil',
            'user'    => $user,
            'token'   => $token,
        ]);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::with(['kelas', 'tahunAjaran'])
            ->where('email', $validated['email'])
            ->first();

        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            return response()->json(['message' => 'Email atau password salah'], 401);
        }

        if (! $user->isSiswa()) {
            throw ValidationException::withMessages([
                'email' => ['Login mobile hanya untuk akun siswa.'],
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken('siswa-mobile')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token_type' => 'Bearer',
            'token'   => $token,
            'user'    => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'foto' => $user->foto,
                'id_kelas' => $user->id_kelas,
                'id_tahun_ajaran' => $user->id_tahun_ajaran,
                'kelas' => $user->kelas ? [
                    'id' => $user->kelas->id,
                    'kelas' => $user->kelas->kelas,
                ] : null,
                'tahun_ajaran' => $user->tahunAjaran ? [
                    'id' => $user->tahunAjaran->id,
                    'nama' => $user->tahunAjaran->nama,
                    'is_active' => (bool) $user->tahunAjaran->is_active,
                ] : null,
            ],
        ]);
    }

    public function user(Request $request)
    {
        $user = $request->user()->loadMissing(['kelas', 'tahunAjaran']);

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'foto' => $user->foto,
                'id_kelas' => $user->id_kelas,
                'id_tahun_ajaran' => $user->id_tahun_ajaran,
                'kelas' => $user->kelas ? [
                    'id' => $user->kelas->id,
                    'kelas' => $user->kelas->kelas,
                ] : null,
                'tahun_ajaran' => $user->tahunAjaran ? [
                    'id' => $user->tahunAjaran->id,
                    'nama' => $user->tahunAjaran->nama,
                    'is_active' => (bool) $user->tahunAjaran->is_active,
                ] : null,
            ],
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout berhasil']);
    }

}
