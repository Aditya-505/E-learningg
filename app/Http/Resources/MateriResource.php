<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MateriResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'isi_materi' => $this->isi_materi,
            'foto' => $this->foto,
            'foto_url' => $this->foto ? asset('storage/materi/' . $this->foto) : null,
            'mapel' => $this->mapel ? [
                'id' => $this->mapel->id,
                'nama_mapel' => $this->mapel->nama_mapel,
                'kode_mapel' => $this->mapel->kode_mapel,
            ] : null,
            'kelas' => $this->kelas ? [
                'id' => $this->kelas->id,
                'kelas' => $this->kelas->kelas,
            ] : null,
            'created_at' => optional($this->created_at)->toISOString(),
            'updated_at' => optional($this->updated_at)->toISOString(),
        ];
    }
}
