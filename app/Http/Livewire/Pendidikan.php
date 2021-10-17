<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pendidikan as Pendidikans;

class Pendidikan extends Component
{
    use WithPagination;
  public $id_pendidikan;
  public $tempat_pendidikan;
  public $jurusan_pendidikan;
  public $tahun_pendidikan;
  public $deskripsi_pendidikan;
  public $cari; 

  protected $paginationTheme = 'bootstrap';

  protected $messages = [
    'tempat_pendidikan.required' => 'Data tempat sosial media Harus diisi',
    'jurusan_pendidikan.required' => 'Data jurusan sosial media Harus diisi',
  ];


  // AdminMiddleware.middleware('admin');

  public function resetInputFields(){
    $this->id_pendidikan = "";
    $this->tempat_pendidikan = "";
    $this->jurusan_pendidikan = "";
    $this->tahun_pendidikan = "";
    $this->deskripsi_pendidikan = "";
  }

  public function updated($fields){
    $this->validateOnly($fields,[
      'tempat_pendidikan' => 'required',
      'jurusan_pendidikan' => 'required',
      'tahun_pendidikan' => 'required|int',
    ]);

  }

  public function tambah(){
    $this->resetInputFields();
  }

  public function store()
  {
    $validateData = $this->validate([
      'tempat_pendidikan' => 'required',
      'jurusan_pendidikan' => 'required',
      'tahun_pendidikan' => 'required',
    ]);
    $validateData['deskripsi_pendidikan']= $this->deskripsi_pendidikan;
    Pendidikans::create($validateData);
    $this->resetInputFields();
    $this->emit('pendidikanAdded');
  }


  public function edit($id_pendidikan){
    $pendidikan = Pendidikans::where('id_pendidikan',$id_pendidikan)->first();
    $this->id_pendidikan = $pendidikan->id_pendidikan; 
    $this->tempat_pendidikan = $pendidikan->tempat_pendidikan; 
    $this->jurusan_pendidikan = $pendidikan->jurusan_pendidikan; 
    $this->tahun_pendidikan = $pendidikan->tahun_pendidikan;
    $this->deskripsi_pendidikan = $pendidikan->deskripsi_pendidikan; 
  }

  public function update(){
    $this->validate([
      'tempat_pendidikan' => 'required',
      'jurusan_pendidikan' => 'required',
      'tahun_pendidikan' => 'required',
    ]);
    if($this->id_pendidikan){
      $pendidikan = Pendidikans::find($this->id_pendidikan);
      $pendidikan->update([
        'tempat_pendidikan' => $this->tempat_pendidikan,
        'jurusan_pendidikan' => $this->jurusan_pendidikan,
        'tahun_pendidikan' => $this->tahun_pendidikan,
        'deskripsi_pendidikan' => $this->deskripsi_pendidikan,
      ]);
      $this->emit('pendidikanUpdated');
    }
  }

  public function hapus($id_pendidikan){
    $pendidikan = Pendidikans::where('id_pendidikan',$id_pendidikan)->first();
    $this->id_pendidikan = $pendidikan->id_pendidikan; 
    $this->tempat_pendidikan = $pendidikan->tempat_pendidikan; 
    $this->jurusan_pendidikan = $pendidikan->jurusan_pendidikan; 
    $this->tahun_pendidikan = $pendidikan->tahun_pendidikan;
    $this->deskripsi_pendidikan = $pendidikan->deskripsi_pendidikan; 
  }

  public function delete(){
    if($this->id_pendidikan){
      $pendidikan = Pendidikans::find($this->id_pendidikan);
      $pendidikan->delete();
      $this->emit('pendidikanDeleted');
    }
  }

  public function render()
  {
    $cari = '%'.$this->cari.'%';
    $pendidikans = Pendidikans::where('tempat_pendidikan','Like',$cari)
    ->orWhere('jurusan_pendidikan','Like',$cari)
    ->orWhere('tahun_pendidikan','Like',$cari)
    ->orWhere('deskripsi_pendidikan','Like',$cari)->latest()->paginate(5);
    return view('admin.pendidikan',['pendidikans'=>$pendidikans])->layout('layouts.admin');
  }
}
