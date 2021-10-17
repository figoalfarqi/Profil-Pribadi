<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $primaryKey = 'id_proyek';
    protected $fillable = ['judul_proyek','deskripsi_proyek','image_proyek'];
}
