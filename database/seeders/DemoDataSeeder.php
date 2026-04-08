<?php

namespace Database\Seeders;

use App\Models\JawabanQuiz;
use App\Models\JawabanTugas;
use App\Models\jurusan;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\NilaiQuiz;
use App\Models\NilaiTugas;
use App\Models\Post;
use App\Models\Quiz;
use App\Models\SoalQuiz;
use App\Models\SoalTugas;
use App\Models\TahunAjaran;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoDataSeeder extends Seeder
{
    public function run()
    {
        $tahunAjaran = [
            TahunAjaran::updateOrCreate(
                ['nama' => '2024/2025'],
                ['is_active' => false]
            ),
            TahunAjaran::updateOrCreate(
                ['nama' => '2025/2026'],
                ['is_active' => true]
            ),
            TahunAjaran::updateOrCreate(
                ['nama' => '2026/2027'],
                ['is_active' => false]
            ),
        ];

        $kelas = [
            Kelas::updateOrCreate(['kelas' => 'X RPL 1'], []),
            Kelas::updateOrCreate(['kelas' => 'XI RPL 1'], []),
            Kelas::updateOrCreate(['kelas' => 'XII RPL 1'], []),
        ];

        $mapel = [
            Mapel::updateOrCreate(
                ['kode_mapel' => 'MAT101'],
                ['nama_mapel' => 'Matematika']
            ),
            Mapel::updateOrCreate(
                ['kode_mapel' => 'BIO102'],
                ['nama_mapel' => 'Biologi']
            ),
            Mapel::updateOrCreate(
                ['kode_mapel' => 'RPL103'],
                ['nama_mapel' => 'Pemrograman Dasar']
            ),
        ];

        $jurusan = [
            jurusan::updateOrCreate(
                ['jurusan' => 'Rekayasa Perangkat Lunak'],
                [
                    'tentang_jurusan' => 'Belajar dasar pengembangan perangkat lunak dan aplikasi.',
                    'foto' => null,
                ]
            ),
            jurusan::updateOrCreate(
                ['jurusan' => 'Teknik Komputer dan Jaringan'],
                [
                    'tentang_jurusan' => 'Fokus pada jaringan komputer, infrastruktur, dan layanan internet.',
                    'foto' => null,
                ]
            ),
            jurusan::updateOrCreate(
                ['jurusan' => 'Multimedia'],
                [
                    'tentang_jurusan' => 'Mempelajari desain visual, video, dan produksi media digital.',
                    'foto' => null,
                ]
            ),
        ];

        $admin = User::where('email', 'admin@gmail.com')->firstOrFail();
        $guru = User::where('email', 'guru@gmail.com')->firstOrFail();
        $siswa = User::where('email', 'siswa@gmail.com')->firstOrFail();

        User::whereKey($guru->id)->update([
            'id_kelas' => null,
            'id_tahun_ajaran' => $tahunAjaran[1]->id,
        ]);

        User::whereKey($siswa->id)->update([
            'id_kelas' => $kelas[0]->id,
            'id_tahun_ajaran' => $tahunAjaran[1]->id,
        ]);

        User::whereKey($admin->id)->update([
            'id_kelas' => null,
            'id_tahun_ajaran' => $tahunAjaran[1]->id,
        ]);

        foreach ($kelas as $item) {
            DB::table('guru_kelas')->updateOrInsert(
                [
                    'user_id' => $guru->id,
                    'kelas_id' => $item->id,
                ],
                [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $materi = [
            Materi::updateOrCreate(
                ['judul' => 'Pengenalan Aljabar'],
                [
                    'isi_materi' => 'Materi pengenalan konsep aljabar untuk kelas X.',
                    'id_mapel' => $mapel[0]->id,
                    'id_kelas' => $kelas[0]->id,
                    'foto' => null,
                ]
            ),
            Materi::updateOrCreate(
                ['judul' => 'Struktur Sel'],
                [
                    'isi_materi' => 'Materi dasar biologi tentang struktur dan fungsi sel.',
                    'id_mapel' => $mapel[1]->id,
                    'id_kelas' => $kelas[1]->id,
                    'foto' => null,
                ]
            ),
            Materi::updateOrCreate(
                ['judul' => 'Dasar Variabel dan Tipe Data'],
                [
                    'isi_materi' => 'Materi pemrograman dasar mengenal variabel dan tipe data.',
                    'id_mapel' => $mapel[2]->id,
                    'id_kelas' => $kelas[2]->id,
                    'foto' => null,
                ]
            ),
        ];

        $quiz = [
            Quiz::updateOrCreate(
                ['kode_quiz' => 'QUIZ-X-001'],
                [
                    'judul' => 'Quiz Aljabar',
                    'jumlah_soal' => 3,
                    'id_kelas' => $kelas[0]->id,
                    'id_mapel' => $mapel[0]->id,
                    'foto' => null,
                    'tenggat_waktu' => now()->addDays(7),
                    'durasi' => 30,
                ]
            ),
            Quiz::updateOrCreate(
                ['kode_quiz' => 'QUIZ-XI-002'],
                [
                    'judul' => 'Quiz Biologi',
                    'jumlah_soal' => 3,
                    'id_kelas' => $kelas[1]->id,
                    'id_mapel' => $mapel[1]->id,
                    'foto' => null,
                    'tenggat_waktu' => now()->addDays(8),
                    'durasi' => 35,
                ]
            ),
            Quiz::updateOrCreate(
                ['kode_quiz' => 'QUIZ-XII-003'],
                [
                    'judul' => 'Quiz Pemrograman',
                    'jumlah_soal' => 3,
                    'id_kelas' => $kelas[2]->id,
                    'id_mapel' => $mapel[2]->id,
                    'foto' => null,
                    'tenggat_waktu' => now()->addDays(9),
                    'durasi' => 40,
                ]
            ),
        ];

        $tugas = [
            Tugas::updateOrCreate(
                ['kode_tugas' => 'TGS-X-001'],
                [
                    'judul' => 'Tugas Aljabar',
                    'jumlah_soal' => 3,
                    'id_kelas' => $kelas[0]->id,
                    'id_mapel' => $mapel[0]->id,
                    'foto' => null,
                    'tenggat_waktu' => now()->addDays(10),
                ]
            ),
            Tugas::updateOrCreate(
                ['kode_tugas' => 'TGS-XI-002'],
                [
                    'judul' => 'Tugas Biologi',
                    'jumlah_soal' => 3,
                    'id_kelas' => $kelas[1]->id,
                    'id_mapel' => $mapel[1]->id,
                    'foto' => null,
                    'tenggat_waktu' => now()->addDays(11),
                ]
            ),
            Tugas::updateOrCreate(
                ['kode_tugas' => 'TGS-XII-003'],
                [
                    'judul' => 'Tugas Pemrograman',
                    'jumlah_soal' => 3,
                    'id_kelas' => $kelas[2]->id,
                    'id_mapel' => $mapel[2]->id,
                    'foto' => null,
                    'tenggat_waktu' => now()->addDays(12),
                ]
            ),
        ];

        $soalQuiz = [
            SoalQuiz::updateOrCreate(
                ['id_quiz' => $quiz[0]->id, 'pertanyaan' => '2 + 2 = ?'],
                [
                    'foto' => null,
                    'pilihan_a' => '2',
                    'pilihan_b' => '3',
                    'pilihan_c' => '4',
                    'pilihan_d' => '5',
                    'jawaban_benar' => 'C',
                ]
            ),
            SoalQuiz::updateOrCreate(
                ['id_quiz' => $quiz[0]->id, 'pertanyaan' => '5 x 3 = ?'],
                [
                    'foto' => null,
                    'pilihan_a' => '15',
                    'pilihan_b' => '10',
                    'pilihan_c' => '20',
                    'pilihan_d' => '8',
                    'jawaban_benar' => 'A',
                ]
            ),
            SoalQuiz::updateOrCreate(
                ['id_quiz' => $quiz[0]->id, 'pertanyaan' => '9 - 4 = ?'],
                [
                    'foto' => null,
                    'pilihan_a' => '6',
                    'pilihan_b' => '5',
                    'pilihan_c' => '4',
                    'pilihan_d' => '3',
                    'jawaban_benar' => 'B',
                ]
            ),
        ];

        $soalTugas = [
            SoalTugas::updateOrCreate(
                ['id_tugas' => $tugas[0]->id, 'pertanyaan' => 'Hasil 10 + 5 adalah?'],
                [
                    'foto' => null,
                    'pilihan_a' => '12',
                    'pilihan_b' => '13',
                    'pilihan_c' => '14',
                    'pilihan_d' => '15',
                    'jawaban_benar' => 'D',
                ]
            ),
            SoalTugas::updateOrCreate(
                ['id_tugas' => $tugas[0]->id, 'pertanyaan' => 'Hasil 6 x 6 adalah?'],
                [
                    'foto' => null,
                    'pilihan_a' => '36',
                    'pilihan_b' => '30',
                    'pilihan_c' => '42',
                    'pilihan_d' => '28',
                    'jawaban_benar' => 'A',
                ]
            ),
            SoalTugas::updateOrCreate(
                ['id_tugas' => $tugas[0]->id, 'pertanyaan' => 'Hasil 20 : 4 adalah?'],
                [
                    'foto' => null,
                    'pilihan_a' => '2',
                    'pilihan_b' => '4',
                    'pilihan_c' => '5',
                    'pilihan_d' => '6',
                    'jawaban_benar' => 'C',
                ]
            ),
        ];

        foreach ($soalQuiz as $index => $soal) {
            JawabanQuiz::updateOrCreate(
                [
                    'id_user' => $siswa->id,
                    'id_quiz' => $quiz[0]->id,
                    'id_soal' => $soal->id,
                ],
                [
                    'jawaban' => ['C', 'A', 'B'][$index],
                    'benar' => true,
                ]
            );
        }

        foreach ($soalTugas as $index => $soal) {
            JawabanTugas::updateOrCreate(
                [
                    'id_user' => $siswa->id,
                    'id_tugas' => $tugas[0]->id,
                    'id_soal' => $soal->id,
                ],
                [
                    'jawaban' => ['D', 'A', 'C'][$index],
                    'benar' => true,
                ]
            );
        }

        foreach ($quiz as $index => $item) {
            NilaiQuiz::updateOrCreate(
                [
                    'id_user' => $siswa->id,
                    'id_quiz' => $item->id,
                ],
                [
                    'nilai' => (string) [95, 88, 90][$index],
                ]
            );
        }

        foreach ($tugas as $index => $item) {
            NilaiTugas::updateOrCreate(
                [
                    'id_user' => $siswa->id,
                    'id_tugas' => $item->id,
                ],
                [
                    'nilai' => (string) [93, 87, 91][$index],
                ]
            );
        }

        Post::updateOrCreate(
            ['slug' => 'pengumuman-kegiatan-sekolah'],
            [
                'title' => 'Pengumuman Kegiatan Sekolah',
                'content' => 'Kegiatan sekolah minggu ini akan dimulai pada hari Senin pukul 07.00.',
                'status' => 1,
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'jadwal-ujian-tengah-semester'],
            [
                'title' => 'Jadwal Ujian Tengah Semester',
                'content' => 'Jadwal ujian tengah semester sudah tersedia dan dapat dilihat pada dashboard.',
                'status' => 1,
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'tips-belajar-efektif'],
            [
                'title' => 'Tips Belajar Efektif',
                'content' => 'Gunakan metode belajar terjadwal dan evaluasi hasil setiap pekan.',
                'status' => 1,
            ]
        );
    }
}
