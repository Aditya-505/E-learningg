<?php

namespace Tests\Feature\Api;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Quiz;
use App\Models\SoalQuiz;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class QuizControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_siswa_can_fetch_quiz_for_their_class(): void
    {
        $kelasSiswa = Kelas::create(['kelas' => 'X RPL 1']);
        $kelasLain = Kelas::create(['kelas' => 'XI TKJ 1']);
        $mapel = Mapel::create([
            'nama_mapel' => 'Pemrograman Dasar',
            'kode_mapel' => 'RPL201',
        ]);

        Quiz::create([
            'kode_quiz' => 'QUIZ-001',
            'judul' => 'Quiz Siswa',
            'jumlah_soal' => 3,
            'id_kelas' => $kelasSiswa->id,
            'id_mapel' => $mapel->id,
            'tenggat_waktu' => now()->addDay(),
            'durasi' => 30,
        ]);

        Quiz::create([
            'kode_quiz' => 'QUIZ-002',
            'judul' => 'Quiz Kelas Lain',
            'jumlah_soal' => 3,
            'id_kelas' => $kelasLain->id,
            'id_mapel' => $mapel->id,
            'tenggat_waktu' => now()->addDay(),
            'durasi' => 30,
        ]);

        $user = User::factory()->create([
            'role' => 'siswa',
            'id_kelas' => $kelasSiswa->id,
        ]);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/quiz');

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.judul', 'Quiz Siswa');
    }

    public function test_siswa_can_fetch_quiz_detail(): void
    {
        $kelas = Kelas::create(['kelas' => 'X RPL 1']);
        $mapel = Mapel::create([
            'nama_mapel' => 'Matematika',
            'kode_mapel' => 'MAT202',
        ]);

        $quiz = Quiz::create([
            'kode_quiz' => 'QUIZ-DETAIL',
            'judul' => 'Quiz Persamaan',
            'jumlah_soal' => 1,
            'id_kelas' => $kelas->id,
            'id_mapel' => $mapel->id,
            'tenggat_waktu' => now()->addDay(),
            'durasi' => 20,
        ]);

        SoalQuiz::create([
            'id_quiz' => $quiz->id,
            'pertanyaan' => '2 + 2 = ?',
            'pilihan_a' => '2',
            'pilihan_b' => '3',
            'pilihan_c' => '4',
            'pilihan_d' => '5',
            'jawaban_benar' => 'C',
        ]);

        $user = User::factory()->create([
            'role' => 'siswa',
            'id_kelas' => $kelas->id,
        ]);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/quiz/' . $quiz->id);

        $response
            ->assertOk()
            ->assertJsonPath('data.judul', 'Quiz Persamaan')
            ->assertJsonPath('data.soal.0.pertanyaan', '2 + 2 = ?');
    }
}
