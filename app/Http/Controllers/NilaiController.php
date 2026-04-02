<?php
// app/Http/Controllers/AdminNilaiController.php
namespace App\Http\Controllers;

use App\Models\NilaiTugas;
use App\Models\Tugas;

class NilaiController extends Controller
{
    /**
     * Display a listing of all tugas with completion statistics.
     */
    public function index()
    {
        $tugas = Tugas::with(['mapel', 'nilai.user'])->get()->map(function ($item) {
            $item->total_siswa_mengerjakan = $item->nilai->count();
            $item->rata_rata_nilai         = $item->nilai->avg('nilai');
            return $item;
        });

        return view('admin.nilai.index', compact('tugas'));
    }

    /**
     * Show detailed results for a specific tugas.
     */
    public function show($id)
    {
        $tugas = Tugas::with(['mapel', 'nilai.user'])->findOrFail($id);

        // Get all students who completed this tugas
        $nilai = NilaiTugas::with('user')
            ->where('id_tugas', $id)
            ->orderBy('nilai', 'desc')
            ->get();

        // Calculate statistics
        $stats = [
            'total_siswa'     => $nilai->count(),
            'rata_rata'       => $nilai->avg('nilai'),
            'nilai_tertinggi' => $nilai->max('nilai'),
            'nilai_terendah'  => $nilai->min('nilai'),
            'lulus'           => $nilai->where('nilai', '>=', 70)->count(),
            'tidak_lulus'     => $nilai->where('nilai', '<', 70)->count(),
        ];

        return view('admin.nilai.show', compact('tugas', 'nilai', 'stats'));
    }

    /**
     * Export results to Excel (optional).
     */
    public function export($id)
    {
        // You can implement Excel export here using Laravel Excel package
        // For now, we'll just redirect back
        return redirect()->back()->with('info', 'Fitur export akan segera tersedia.');
    }
}
