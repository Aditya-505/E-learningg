<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_mapel','kode_mapel','create_at','update_at'] ;
    public $timestamps = true;
    
 }
