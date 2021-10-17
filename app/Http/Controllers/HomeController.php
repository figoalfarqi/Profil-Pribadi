<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\SosialMedia;
use App\Models\TentangSaya;
use App\Models\Pengalaman;
use App\Models\Pendidikan;
use App\Models\Keahlian;
use App\Models\Proyek;
class HomeController extends Controller
{
  public function index(Request $request){
    $profils = Profil::all()->first();
    $sosial_medias = SosialMedia::all();
    $sosial_medias->keahlians = Keahlian::all();
    $sosial_medias->tentang_sayas = TentangSaya::all();
    $sosial_medias->pengalamans = Pengalaman::all();
    $sosial_medias->pendidikans = Pendidikan::all();
    $sosial_medias->keahlians = Keahlian::all();
    $sosial_medias->proyeks = Proyek::all();
    return view('index',['profils'=>$profils,'sosial_medias'=>$sosial_medias]);
  }
}
