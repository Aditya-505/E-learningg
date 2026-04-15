<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $query = Quiz::with(['mapel', 'kelas'])->latest();

        if ($user && $user->role === 'siswa' && $user->id_kelas) {
            $query->where('id_kelas', $user->id_kelas);
        }

        return response()->json([
            'data' => QuizResource::collection($query->get()),
            'message' => 'Fetch all quiz',
            'success' => true,
        ]);
    }

    public function show(Request $request, Quiz $quiz)
    {
        $user = $request->user();
        $quiz->load(['mapel', 'kelas', 'soal']);

        if ($user && $user->role === 'siswa' && $user->id_kelas && $quiz->id_kelas !== $user->id_kelas) {
            abort(403, 'Anda tidak memiliki akses ke quiz ini.');
        }

        return response()->json([
            'data' => new QuizResource($quiz),
            'message' => 'Detail quiz ditemukan',
            'success' => true,
        ]);
    }
}
