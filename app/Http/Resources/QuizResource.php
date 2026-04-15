<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'kode_quiz' => $this->kode_quiz,
            'judul' => $this->judul,
            'jumlah_soal' => $this->jumlah_soal,
            'durasi' => $this->durasi,
            'foto' => $this->foto,
            'foto_url' => $this->foto ? asset('storage/quiz/' . $this->foto) : null,
            'tenggat_waktu' => optional($this->tenggat_waktu)->toISOString(),
            'mapel' => $this->mapel ? [
                'id' => $this->mapel->id,
                'nama_mapel' => $this->mapel->nama_mapel,
                'kode_mapel' => $this->mapel->kode_mapel,
            ] : null,
            'kelas' => $this->kelas ? [
                'id' => $this->kelas->id,
                'kelas' => $this->kelas->kelas,
            ] : null,
            'soal' => $this->whenLoaded('soal', function () {
                return $this->soal->map(function ($soal) {
                    return [
                        'id' => $soal->id,
                        'pertanyaan' => $soal->pertanyaan,
                        'pilihan_a' => $soal->pilihan_a,
                        'pilihan_b' => $soal->pilihan_b,
                        'pilihan_c' => $soal->pilihan_c,
                        'pilihan_d' => $soal->pilihan_d,
                        'jawaban_benar' => $soal->jawaban_benar,
                    ];
                });
            }),
        ];
    }
}
