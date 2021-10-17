<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Profil as Profils;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
class Profil extends Component
{
  use WithPagination;
  use WithFileUploads;
  public $id_profil;
  public $nama_profil;
  public $tempat_lahir_profil;
  public $tanggal_lahir_profil;
  public $id_agama;
  public $id_jabatan;
  public $status_profil;
  public $alamat_profil;
  public $foto;
  public $foto_saat_ini;
  public $cari; 

  protected $paginationTheme = 'bootstrap';

  protected $messages = [
    'profil.required' => 'profil Harus diisi',
  ];

  public function resetInputFields(){
    $this->id_profil = "";
    $this->nama = "";
    $this->pekerjaan = "";
    $this->judul_profil = "";
    $this->deskripsi_profil = "";
    $this->tanggal_lahir = "";
    $this->nomor_telepon = "";
    $this->alamat = "";
    $this->email = "";
    $this->foto = "";
    $this->foto_saat_ini = "";
  }

  public function updated($fields){
    $this->validateOnly($fields,[
      'nama' => 'required',
      'pekerjaan' => 'required',
      'judul_profil' => 'required',
      'deskripsi_profil' => 'required',
      'tanggal_lahir' => 'required',
      'nomor_telepon' => 'required',
      'alamat' => 'required',
      'email' => 'required',
      'foto' => 'required',
    ]);

  }

  public function tambah(){
    $this->resetInputFields();
  }

  public function store()
  {
    $validateData = $this->validate([
      'nama' => 'required',
      'pekerjaan' => 'required',
      'judul_profil' => 'required',
      'deskripsi_profil' => 'required',
      'tanggal_lahir' => 'required',
      'nomor_telepon' => 'required',
      'alamat' => 'required',
      'email' => 'required',
      'foto' => 'required',
    ]);
    $namaFile="";
    if($this->foto){
      $extFile=$this->foto->getClientOriginalExtension();
      $namaFile=time().Str::random(8).".".$extFile;
      $path=$this->foto->storeAs('image/foto_profil',$namaFile);
    }

    $validateData['foto']= $namaFile;
    Profils::create($validateData);
    $this->resetInputFields();
    $this->emit('profilAdded');
  }

  public function edit($id_profil){
    $profil = Profils::where('id_profil',$id_profil)->first();
    $this->id_profil = $profil->id_profil;
    $this->nama = $profil->nama;
    $this->pekerjaan = $profil->pekerjaan;
    $this->judul_profil = $profil->judul_profil;
    $this->deskripsi_profil = $profil->deskripsi_profil;
    $this->tanggal_lahir = $profil->tanggal_lahir;
    $this->nomor_telepon = $profil->nomor_telepon; 
    $this->alamat = $profil->alamat;
    $this->email = $profil->email;
    $this->foto_saat_ini = $profil->foto;
  }


  public function update(){
    $this->validate([
      'nama' => 'required',
      'pekerjaan' => 'required',
      'judul_profil' => 'required',
      'deskripsi_profil' => 'required',
      'tanggal_lahir' => 'required',
      'nomor_telepon' => 'required',
      'alamat' => 'required',
      'email' => 'required',
    ]);
    $profil = Profils::where('id_profil',$this->id_profil)->first();
    $namaFile="";
    if($this->foto){
      if($profil->foto){
        File::delete('image/foto_profil/'.$profil->foto);
      }
      $extFile=$this->foto->getClientOriginalExtension();
      $namaFile=time().Str::random(8).".".$extFile;
      $path=$this->foto->storeAs('image/foto_profil',$namaFile);
    }
    else{
      $namaFile=$profil->foto;
    }
    if($this->id_profil){
      $profil = Profils::find($this->id_profil);
      $profil->update([
        'nama' => $this->nama,
        'pekerjaan' => $this->pekerjaan,
        'judul_profil' => $this->judul_profil,
        'deskripsi_profil' => $this->deskripsi_profil,
        'tanggal_lahir' => $this->tanggal_lahir,
        'nomor_telepon' => $this->nomor_telepon,
        'alamat' => $this->alamat,
        'email' => $this->email,
        'foto' => $namaFile,
        ]);
      $this->emit('profilUpdated');
    }
  }

  public function hapus($id_profil){
    $profil = Profils::where('id_profil',$id_profil)->first();
    $this->id_profil = $profil->id_profil; 
    $this->nama = $profil->nama; 
    $this->pekerjaan = $profil->pekerjaan; 
    $this->judul_profil = $profil->judul_profil; 
    $this->deskripsi_profil = $profil->deskripsi_profil; 
    $this->tanggal_lahir = $profil->tanggal_lahir; 
    $this->nomor_telepon = $profil->nomor_telepon; 
    $this->alamat = $profil->alamat; 
    $this->email = $profil->email; 
    $this->foto = $profil->foto; 
    $this->foto_saat_ini = $profil->foto;
  }

  public function delete(){
    if($this->id_profil){
      $profil = Profils::find($this->id_profil);
      File::delete('image/foto_profil/'.$profil->foto);
      $profil->delete();
      $this->emit('profilDeleted');
    }
  }


  public function render()
  {
    $cari = '%'.$this->cari.'%';
    $profils = Profils::where('nama','Like',$cari)
    ->orWhere('pekerjaan','Like',$cari)
    ->orWhere('judul_profil','Like',$cari)
    ->orWhere('deskripsi_profil','Like',$cari)
    ->orWhere('tanggal_lahir','Like',$cari)
    ->orWhere('nomor_telepon','Like',$cari)
    ->orWhere('alamat','Like',$cari)
    ->orWhere('email','Like',$cari)
    ->orWhere('foto','Like',$cari)->latest('profils.created_at')->paginate(5);
    return view('admin.profil',['profils'=>$profils])->layout('layouts.admin');
  }
}

