<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Keahlian as Keahlians;

class keahlian extends Component
{
  use WithPagination;
  public $id_keahlian;
  public $nilai_keahlian;
  public $nama_keahlian;
  public $cari; 

  protected $paginationTheme = 'bootstrap';

  protected $messages = [
    'nilai_keahlian.required' => 'Data nilai sosial media Harus diisi',
    'nama_keahlian.required' => 'Data nama sosial media Harus diisi',
  ];


  // AdminMiddleware.middleware('admin');

  public function resetInputFields(){
    $this->id_keahlian = "";
    $this->nilai_keahlian = "";
    $this->nama_keahlian = "";
  }

  public function updated($fields){
    $this->validateOnly($fields,[
      'nilai_keahlian' => 'required',
      'nama_keahlian' => 'required',
    ]);

  }

  public function tambah(){
    $this->resetInputFields();
  }

  public function store()
  {
    $validateData = $this->validate([
      'nilai_keahlian' => 'required',
      'nama_keahlian' => 'required',
    ]);
    Keahlians::create($validateData);
    $this->resetInputFields();
    $this->emit('keahlianAdded');
  }


  public function edit($id_keahlian){
    $keahlian = Keahlians::where('id_keahlian',$id_keahlian)->first();
    $this->id_keahlian = $keahlian->id_keahlian; 
    $this->nama_keahlian = $keahlian->nama_keahlian; 
    $this->nilai_keahlian = $keahlian->nilai_keahlian; 
  }

  public function update(){
    $this->validate([
      'nama_keahlian' => 'required',
      'nilai_keahlian' => 'required',
    ]);
    if($this->id_keahlian){
      $keahlian = Keahlians::find($this->id_keahlian);
      $keahlian->update([
        'nama_keahlian' => $this->nama_keahlian,
        'nilai_keahlian' => $this->nilai_keahlian,
      ]);
      $this->emit('keahlianUpdated');
    }
  }

  public function hapus($id_keahlian){
    $keahlian = Keahlians::where('id_keahlian',$id_keahlian)->first();
    $this->id_keahlian = $keahlian->id_keahlian; 
    $this->nama_keahlian = $keahlian->nama_keahlian; 
    $this->nilai_keahlian = $keahlian->nilai_keahlian; 
  }

  public function delete(){
    if($this->id_keahlian){
      $keahlian = Keahlians::find($this->id_keahlian);
      $keahlian->delete();
      $this->emit('keahlianDeleted');
    }
  }

  public function render()
  {
    $cari = '%'.$this->cari.'%';
    $keahlians = Keahlians::where('nilai_keahlian','Like',$cari)
    ->orWhere('nama_keahlian','Like',$cari)->latest()->paginate(5);
    return view('admin.keahlian',['keahlians'=>$keahlians])->layout('layouts.admin');
  }
}
