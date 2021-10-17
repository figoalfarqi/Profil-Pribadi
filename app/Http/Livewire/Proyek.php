<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Proyek as Proyeks;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
class Proyek extends Component
{
  use WithPagination;
  use WithFileUploads;
  public $id_proyek;
  public $judul_proyek;
  public $deskripsi_proyek;
  public $image_proyek;
  public $image_saat_ini;
  public $cari; 

  protected $paginationTheme = 'bootstrap';

  protected $messages = [
    'proyek.required' => 'proyek Harus diisi',
  ];

  public function resetInputFields(){
    $this->id_proyek = "";
    $this->judul_proyek = "";
    $this->deskripsi_proyek = "";
    $this->image_proyek = "";
    $this->image_saat_ini = "";
  }

  public function updated($fields){
    $this->validateOnly($fields,[
      'judul_proyek' => 'required',
      'deskripsi_proyek' => 'required',
      'image_proyek' => 'required',
    ]);

  }

  public function tambah(){
    $this->resetInputFields();
  }

  public function store()
  {
    $validateData = $this->validate([
      'judul_proyek' => 'required',
      'deskripsi_proyek' => 'required',
      'image_proyek' => 'required',
    ]);
    $namaFile="";
    if($this->image_proyek){
      $extFile=$this->image_proyek->getClientOriginalExtension();
      $namaFile=time().Str::random(8).".".$extFile;
      $path=$this->image_proyek->storeAs('image/image_proyek',$namaFile);
    }

    $validateData['image_proyek']= $namaFile;
    Proyeks::create($validateData);
    $this->resetInputFields();
    $this->emit('proyekAdded');
  }

  public function edit($id_proyek){
    $proyek = Proyeks::where('id_proyek',$id_proyek)->first();
    $this->id_proyek = $proyek->id_proyek;
    $this->judul_proyek = $proyek->judul_proyek;
    $this->deskripsi_proyek = $proyek->deskripsi_proyek;
    $this->image_saat_ini = $proyek->image_proyek;
  }


  public function update(){
    $this->validate([
      'judul_proyek' => 'required',
      'deskripsi_proyek' => 'required',
    ]);
    $proyek = Proyeks::where('id_proyek',$this->id_proyek)->first();
    $namaFile="";
    if($this->image_proyek){
      if($proyek->image_proyek){
        File::delete('image/image_proyek/'.$proyek->image_proyek);
      }
      $extFile=$this->image_proyek->getClientOriginalExtension();
      $namaFile=time().Str::random(8).".".$extFile;
      $path=$this->image_proyek->storeAs('image/image_proyek',$namaFile);
    }
    else{
      $namaFile=$proyek->image_proyek;
    }
    if($this->id_proyek){
      $proyek = Proyeks::find($this->id_proyek);
      $proyek->update([
        'judul_proyek' => $this->judul_proyek,
        'deskripsi_proyek' => $this->deskripsi_proyek,
        'image_proyek' => $namaFile,
        ]);
      $this->emit('proyekUpdated');
    }
  }

  public function hapus($id_proyek){
    $proyek = Proyeks::where('id_proyek',$id_proyek)->first();
    $this->id_proyek = $proyek->id_proyek; 
    $this->judul_proyek = $proyek->judul_proyek; 
    $this->deskripsi_proyek = $proyek->deskripsi_proyek;
    $this->image_saat_ini = $proyek->image_proyek;
  }

  public function delete(){
    if($this->id_proyek){
      $proyek = Proyeks::find($this->id_proyek);
      File::delete('image/image_proyek/'.$proyek->image_proyek);
      $proyek->delete();
      $this->emit('proyekDeleted');
    }
  }


  public function render()
  {
    $cari = '%'.$this->cari.'%';
    $proyeks = Proyeks::where('judul_proyek','Like',$cari)
    ->orWhere('deskripsi_proyek','Like',$cari)
    ->orWhere('image_proyek','Like',$cari)->latest()->paginate(5);
    return view('admin.proyek',['proyeks'=>$proyeks])->layout('layouts.admin');
  }
}

