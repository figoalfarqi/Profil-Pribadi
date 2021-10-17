<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    protected $primaryKey = 'id_keahlian';
    protected $fillable = ['nama_keahlian','nilai_keahlian'];
    // protected $table = 'sosial_medias';
}
