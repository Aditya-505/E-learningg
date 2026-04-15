<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TugasResource;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $query = Tugas::with(['mapel', 'kelas'])->latest();

        if ($user && $user->role === 'siswa' && $user->id_kelas) {
            $query->where('id_kelas', $user->id_kelas);
        }

        return response()->json([
            'data' => TugasResource::collection($query->get()),
            'message' => 'Fetch all tugas',
            'success' => true,
        ]);
    }

    public function show(Request $request, Tugas $tuga)
    {
        $user = $request->user();
        $tuga->load(['mapel', 'kelas', 'soal']);

        if ($user && $user->role === 'siswa' && $user->id_kelas && $tuga->id_kelas !== $user->id_kelas) {
            abort(403, 'Anda tidak memiliki akses ke tugas ini.');
        }

        return response()->json([
            'data' => new TugasResource($tuga),
            'message' => 'Detail tugas ditemukan',
            'success' => true,
        ]);
    }
}
