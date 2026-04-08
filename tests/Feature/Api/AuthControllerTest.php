<?php

namespace Tests\Feature\Api;

use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_siswa_can_login_from_mobile_api(): void
    {
        $kelas = Kelas::create([
            'kelas' => 'X RPL 1',
        ]);

        $tahunAjaran = TahunAjaran::create([
            'nama' => '2025/2026',
            'is_active' => true,
        ]);

        $user = User::factory()->create([
            'email' => 'siswa@example.com',
            'role' => 'siswa',
        ]);

        $user->forceFill([
            'id_kelas' => $kelas->id,
            'id_tahun_ajaran' => $tahunAjaran->id,
        ])->save();

        $response = $this->postJson('/api/login', [
            'email' => 'siswa@example.com',
            'password' => 'password',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('message', 'Login berhasil')
            ->assertJsonPath('token_type', 'Bearer')
            ->assertJsonPath('user.email', 'siswa@example.com')
            ->assertJsonPath('user.role', 'siswa')
            ->assertJsonPath('user.kelas.kelas', 'X RPL 1')
            ->assertJsonPath('user.tahun_ajaran.nama', '2025/2026');
    }

    public function test_non_siswa_account_cannot_login_from_mobile_api(): void
    {
        User::factory()->create([
            'email' => 'guru@example.com',
            'role' => 'guru',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'guru@example.com',
            'password' => 'password',
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_authenticated_user_can_fetch_mobile_profile(): void
    {
        $kelas = Kelas::create([
            'kelas' => 'XI TKJ 2',
        ]);

        $tahunAjaran = TahunAjaran::create([
            'nama' => '2026/2027',
            'is_active' => true,
        ]);

        $user = User::factory()->create([
            'role' => 'siswa',
        ]);

        $user->forceFill([
            'id_kelas' => $kelas->id,
            'id_tahun_ajaran' => $tahunAjaran->id,
        ])->save();

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/me');

        $response
            ->assertOk()
            ->assertJsonPath('user.id', $user->id)
            ->assertJsonPath('user.role', 'siswa')
            ->assertJsonPath('user.kelas.kelas', 'XI TKJ 2')
            ->assertJsonPath('user.tahun_ajaran.nama', '2026/2027');
    }
}
