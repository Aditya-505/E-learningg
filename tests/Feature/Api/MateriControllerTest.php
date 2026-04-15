<?php

namespace Tests\Feature\Api;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MateriControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_siswa_can_fetch_materi_for_their_class(): void
    {
        $kelasSiswa = Kelas::create(['kelas' => 'X RPL 1']);
        $kelasLain = Kelas::create(['kelas' => 'XI TKJ 1']);
        $mapel = Mapel::create([
            'nama_mapel' => 'Pemrograman Dasar',
            'kode_mapel' => 'RPL101',
        ]);

        Materi::create([
            'judul' => 'Materi Kelas Sendiri',
            'isi_materi' => 'Konten kelas sendiri',
            'id_mapel' => $mapel->id,
            'id_kelas' => $kelasSiswa->id,
        ]);

        Materi::create([
            'judul' => 'Materi Kelas Lain',
            'isi_materi' => 'Konten kelas lain',
            'id_mapel' => $mapel->id,
            'id_kelas' => $kelasLain->id,
        ]);

        $user = User::factory()->create([
            'role' => 'siswa',
            'id_kelas' => $kelasSiswa->id,
        ]);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/materi');

        $response
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.judul', 'Materi Kelas Sendiri');
    }

    public function test_siswa_can_fetch_detail_for_their_class_materi(): void
    {
        $kelas = Kelas::create(['kelas' => 'X RPL 1']);
        $mapel = Mapel::create([
            'nama_mapel' => 'Matematika',
            'kode_mapel' => 'MAT101',
        ]);

        $materi = Materi::create([
            'judul' => 'Persamaan Linear',
            'isi_materi' => 'Pembahasan persamaan linear satu variabel.',
            'id_mapel' => $mapel->id,
            'id_kelas' => $kelas->id,
        ]);

        $user = User::factory()->create([
            'role' => 'siswa',
            'id_kelas' => $kelas->id,
        ]);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/materi/' . $materi->id);

        $response
            ->assertOk()
            ->assertJsonPath('data.judul', 'Persamaan Linear')
            ->assertJsonPath('data.mapel.nama_mapel', 'Matematika')
            ->assertJsonPath('data.kelas.kelas', 'X RPL 1');
    }

    public function test_siswa_cannot_fetch_detail_for_other_class_materi(): void
    {
        $kelasSiswa = Kelas::create(['kelas' => 'X RPL 1']);
        $kelasLain = Kelas::create(['kelas' => 'XI TKJ 1']);
        $mapel = Mapel::create([
            'nama_mapel' => 'Biologi',
            'kode_mapel' => 'BIO101',
        ]);

        $materi = Materi::create([
            'judul' => 'Struktur Sel',
            'isi_materi' => 'Materi biologi untuk kelas lain.',
            'id_mapel' => $mapel->id,
            'id_kelas' => $kelasLain->id,
        ]);

        $user = User::factory()->create([
            'role' => 'siswa',
            'id_kelas' => $kelasSiswa->id,
        ]);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/materi/' . $materi->id);

        $response->assertForbidden();
    }
}
