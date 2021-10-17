<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $primaryKey = 'id_pendidikan';
    protected $fillable = ['tempat_pendidikan','jurusan_pendidikan','tahun_pendidikan','deskripsi_pendidikan'];
}
