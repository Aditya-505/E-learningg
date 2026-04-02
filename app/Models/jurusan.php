<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'jurusan', 'tentang_jurusan', 'foto', 'create_at', 'update_at'];
    public $timestamps  = true;
}
