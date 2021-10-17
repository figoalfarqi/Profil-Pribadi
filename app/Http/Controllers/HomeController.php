<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\SosialMedia;
use App\Models\Keahlian;
class HomeController extends Controller
{
  public function index(Request $request){
    $profils = Profil::all()->first();
    $sosialMedias = SosialMedia::all();
    $sosialMedias->keahlians = Keahlian::all();
    return view('index',['profils'=>$profils,'sosialMedias'=>$sosialMedias]);
  }
}
