<?php

namespace Tests\Feature\Api;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\SoalTugas;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TugasControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_siswa_can_fetch_tugas_for_their_class(): void
    {
        $kelasSiswa = Kelas::create(['kelas' => 'X RPL 1']);
        $kelasLain = Kelas::create(['kelas' => 'XI TKJ 1']);
        $mapel = Mapel::create([
            'nama_mapel' => 'Biologi',
            'kode_mapel' => 'BIO301',
        ]);

        Tugas::create([
            'kode_tugas' => 'TUGAS-001',
            'judul' => 'Tugas Sel',
            'jumlah_soal' => 3,
            'id_kelas' => $kelasSiswa->id,
            'id_mapel' => $mapel->id,
            'tenggat_waktu' => now()->addDays(2),
        ]);

        Tugas::create([
            'kode_tugas' => 'TUGAS-002',
            'judul' => 'Tugas Kelas Lain',
            'jumlah_soal' => 3,
            'id_kelas' => $kelasLain->id,
            'id_mapel' => $mapel->id,
            'tenggat_waktu' => now()->addDays(2),
        ]);

        $user = User::factory()->create([
            'role' => 'siswa',
            'id_kelas' => $kelasSiswa->id,
        ]);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/tugas');

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.judul', 'Tugas Sel');
    }

    public function test_siswa_can_fetch_tugas_detail(): void
    {
        $kelas = Kelas::create(['kelas' => 'X RPL 1']);
        $mapel = Mapel::create([
            'nama_mapel' => 'Pemrograman',
            'kode_mapel' => 'RPL302',
        ]);

        $tugas = Tugas::create([
            'kode_tugas' => 'TUGAS-DETAIL',
            'judul' => 'Tugas Variabel',
            'jumlah_soal' => 1,
            'id_kelas' => $kelas->id,
            'id_mapel' => $mapel->id,
            'tenggat_waktu' => now()->addDays(2),
        ]);

        SoalTugas::create([
            'id_tugas' => $tugas->id,
            'pertanyaan' => 'Tipe data untuk angka bulat adalah?',
            'pilihan_a' => 'String',
            'pilihan_b' => 'Integer',
            'pilihan_c' => 'Boolean',
            'pilihan_d' => 'Character',
            'jawaban_benar' => 'B',
        ]);

        $user = User::factory()->create([
            'role' => 'siswa',
            'id_kelas' => $kelas->id,
        ]);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/tugas/' . $tugas->id);

        $response
            ->assertOk()
            ->assertJsonPath('data.judul', 'Tugas Variabel')
            ->assertJsonPath('data.soal.0.pertanyaan', 'Tipe data untuk angka bulat adalah?');
    }
}
