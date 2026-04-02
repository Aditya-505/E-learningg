<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanTugas extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'id_tugas', 'id_soal', 'jawaban', 'benar'];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function tugas(){
        return $this->belongsTo(Tugas::class, 'id_tugas');
    }
    public function soal(){
        return $this->belongsTo(SoalTugas::class, 'id_soal');
    }
}
