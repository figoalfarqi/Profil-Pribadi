<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SosialMedia extends Model
{
    protected $primaryKey = 'id_sosial_media';
    protected $fillable = ['jenis_sosial_media','nama_sosial_media','url_sosial_media'];
    protected $table = 'sosial_medias';
}
