<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangSaya extends Model
{
    protected $primaryKey = 'id_tentang_saya';
    protected $fillable = ['judul_tentang_saya','deskripsi_tentang_saya','image_tentang_saya'];

}
