<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MateriResource;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $query = Materi::with(['mapel', 'kelas'])->latest();

        if ($user && $user->role === 'siswa' && $user->id_kelas) {
            $query->where('id_kelas', $user->id_kelas);
        }

        $materi = $query->get();

        return response()->json([
            'data' => MateriResource::collection($materi),
            'message' => 'Fetch all materi',
            'success' => true,
        ]);
    }

    public function show(Request $request, Materi $materi)
    {
        $user = $request->user();
        $materi->load(['mapel', 'kelas']);

        if ($user && $user->role === 'siswa' && $user->id_kelas && $materi->id_kelas !== $user->id_kelas) {
            abort(403, 'Anda tidak memiliki akses ke materi ini.');
        }

        return response()->json([
            'data' => new MateriResource($materi),
            'message' => 'Detail materi ditemukan',
            'success' => true,
        ]);
    }
}
