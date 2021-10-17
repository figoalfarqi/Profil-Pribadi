<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $primaryKey = 'id_pengalaman';
    protected $fillable = ['tahun_pengalaman','pekerjaan_pengalaman','tempat_pengalaman','posisi_pengalaman','deskripsi_pengalaman'];
    protected $table = 'pengalamans';
}
