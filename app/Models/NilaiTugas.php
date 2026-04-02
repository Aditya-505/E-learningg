<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTugas extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_user','id_tugas','nilai','create_at','update_at'];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function tugas(){
        return $this->belongsTo(Tugas::class, 'id_tugas');
    }
    

}
