<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\TentangSaya as TentangSayas;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
class TentangSaya extends Component
{
  use WithPagination;
  use WithFileUploads;
  public $id_tentang_saya;
  public $judul_tentang_saya;
  public $deskripsi_tentang_saya;
  public $image_tentang_saya;
  public $image_saat_ini;
  public $cari; 

  protected $paginationTheme = 'bootstrap';

  protected $messages = [
    'tentang_saya.required' => 'tentang_saya Harus diisi',
  ];

  public function resetInputFields(){
    $this->id_tentang_saya = "";
    $this->judul_tentang_saya = "";
    $this->deskripsi_tentang_saya = "";
    $this->image_tentang_saya = "";
    $this->image_saat_ini = "";
  }

  public function updated($fields){
    $this->validateOnly($fields,[
      'judul_tentang_saya' => 'required',
      'deskripsi_tentang_saya' => 'required',
      'image_tentang_saya' => 'required',
    ]);

  }

  public function tambah(){
    $this->resetInputFields();
  }

  public function store()
  {
    $validateData = $this->validate([
      'judul_tentang_saya' => 'required',
      'deskripsi_tentang_saya' => 'required',
      'image_tentang_saya' => 'required',
    ]);
    $namaFile="";
    if($this->image_tentang_saya){
      $extFile=$this->image_tentang_saya->getClientOriginalExtension();
      $namaFile=time().Str::random(8).".".$extFile;
      $path=$this->image_tentang_saya->storeAs('image/image_tentang_saya',$namaFile);
    }

    $validateData['image_tentang_saya']= $namaFile;
    TentangSayas::create($validateData);
    $this->resetInputFields();
    $this->emit('tentangSayaAdded');
  }

  public function edit($id_tentang_saya){
    $tentang_saya = TentangSayas::where('id_tentang_saya',$id_tentang_saya)->first();
    $this->id_tentang_saya = $tentang_saya->id_tentang_saya;
    $this->judul_tentang_saya = $tentang_saya->judul_tentang_saya;
    $this->deskripsi_tentang_saya = $tentang_saya->deskripsi_tentang_saya;
    $this->image_saat_ini = $tentang_saya->image_tentang_saya;
  }


  public function update(){
    $this->validate([
      'judul_tentang_saya' => 'required',
      'deskripsi_tentang_saya' => 'required',
    ]);
    $tentang_saya = TentangSayas::where('id_tentang_saya',$this->id_tentang_saya)->first();
    $namaFile="";
    if($this->image_tentang_saya){
      if($tentang_saya->image_tentang_saya){
        File::delete('image/image_tentang_saya/'.$tentang_saya->image_tentang_saya);
      }
      $extFile=$this->image_tentang_saya->getClientOriginalExtension();
      $namaFile=time().Str::random(8).".".$extFile;
      $path=$this->image_tentang_saya->storeAs('image/image_tentang_saya',$namaFile);
    }
    else{
      $namaFile=$tentang_saya->image_tentang_saya;
    }
    if($this->id_tentang_saya){
      $tentang_saya = TentangSayas::find($this->id_tentang_saya);
      $tentang_saya->update([
        'judul_tentang_saya' => $this->judul_tentang_saya,
        'deskripsi_tentang_saya' => $this->deskripsi_tentang_saya,
        'image_tentang_saya' => $namaFile,
        ]);
      $this->emit('tentangSayaUpdated');
    }
  }

  public function hapus($id_tentang_saya){
    $tentang_saya = TentangSayas::where('id_tentang_saya',$id_tentang_saya)->first();
    $this->id_tentang_saya = $tentang_saya->id_tentang_saya; 
    $this->judul_tentang_saya = $tentang_saya->judul_tentang_saya; 
    $this->deskripsi_tentang_saya = $tentang_saya->deskripsi_tentang_saya;
    $this->image_saat_ini = $tentang_saya->image_tentang_saya;
  }

  public function delete(){
    if($this->id_tentang_saya){
      $tentang_saya = TentangSayas::find($this->id_tentang_saya);
      File::delete('image/image_tentang_saya/'.$tentang_saya->image_tentang_saya);
      $tentang_saya->delete();
      $this->emit('tentangSayaDeleted');
    }
  }


  public function render()
  {
    $cari = '%'.$this->cari.'%';
    $tentang_sayas = TentangSayas::where('judul_tentang_saya','Like',$cari)
    ->orWhere('deskripsi_tentang_saya','Like',$cari)
    ->orWhere('image_tentang_saya','Like',$cari)->latest()->paginate(5);
    return view('admin.tentang-saya',['tentang_sayas'=>$tentang_sayas])->layout('layouts.admin');
  }
}

