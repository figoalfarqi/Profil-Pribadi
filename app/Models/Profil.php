<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $primaryKey = 'id_profil';
    protected $fillable = ['nama','pekerjaan','judul_profil','deskripsi_profil','tanggal_lahir','nomor_telepon','alamat','email','foto',];   
}
