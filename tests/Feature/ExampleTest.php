<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_guest_is_redirected_from_home()
    {
        $response = $this->get('/home');

        $response->assertRedirect('/login');
    }

    public function test_guest_is_redirected_from_siswa_page()
    {
        $response = $this->get('/siswa');

        $response->assertRedirect('/login');
    }

    public function test_kelas_index_route_exists()
    {
        $this->assertSame('/kelas', route('kelas.index', absolute: false));
    }
}
