<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pengalaman as Pengalamans;

class Pengalaman extends Component
{
    use WithPagination;
  public $id_pengalaman;
  public $tahun_pengalaman;
  public $pekerjaan_pengalaman;
  public $tempat_pengalaman;
  public $posisi_pengalaman;
  public $deskripsi_pengalaman;

  public $cari; 

  protected $paginationTheme = 'bootstrap';

  protected $messages = [
    'nilai_pengalaman.required' => 'Data nilai sosial media Harus diisi',
    'nama_pengalaman.required' => 'Data nama sosial media Harus diisi',
  ];


  // AdminMiddleware.middleware('admin');

  public function resetInputFields(){
    $this->id_pengalaman = "";
    $this->tahun_pengalaman = "";
    $this->pekerjaan_pengalaman = "";
    $this->tempat_pengalaman = "";
    $this->posisi_pengalaman = "";
    $this->deskripsi_pengalaman = "";
  }

  public function updated($fields){
    $this->validateOnly($fields,[
      'tahun_pengalaman' => 'required|int',
      'pekerjaan_pengalaman' => 'required',
      'tempat_pengalaman' => 'required',
      'posisi_pengalaman' => 'required',
    ]);
  }

  public function tambah(){
    $this->resetInputFields();
  }

  public function store()
  {
    $validateData = $this->validate([
      'tahun_pengalaman' => 'required',
      'pekerjaan_pengalaman' => 'required',
      'tempat_pengalaman' => 'required',
      'posisi_pengalaman' => 'required',
    ]);
    $validateData['deskripsi_pengalaman']= $this->deskripsi_pengalaman;
    Pengalamans::create($validateData);
    $this->resetInputFields();
    $this->emit('pengalamanAdded');
  }


  public function edit($id_pengalaman){
    $pengalaman = Pengalamans::where('id_pengalaman',$id_pengalaman)->first();
    $this->id_pengalaman = $pengalaman->id_pengalaman; 
    $this->tahun_pengalaman = $pengalaman->tahun_pengalaman; 
    $this->pekerjaan_pengalaman = $pengalaman->pekerjaan_pengalaman; 
    $this->tempat_pengalaman = $pengalaman->tempat_pengalaman; 
    $this->posisi_pengalaman = $pengalaman->posisi_pengalaman; 
    $this->deskripsi_pengalaman = $pengalaman->deskripsi_pengalaman; 
  }

  public function update(){
    $this->validate([
      'tahun_pengalaman' => 'required',
      'pekerjaan_pengalaman' => 'required',
      'tempat_pengalaman' => 'required',
      'posisi_pengalaman' => 'required',
    ]);
    if($this->id_pengalaman){
      $pengalaman = Pengalamans::find($this->id_pengalaman);
      $pengalaman->update([
        'tahun_pengalaman' => $this->tahun_pengalaman,
        'pekerjaan_pengalaman' => $this->pekerjaan_pengalaman,
        'tempat_pengalaman' => $this->tempat_pengalaman,
        'posisi_pengalaman' => $this->posisi_pengalaman,
        'deskripsi_pengalaman' => $this->deskripsi_pengalaman,
      ]);
      $this->emit('pengalamanUpdated');
    }
  }

  public function hapus($id_pengalaman){
    $pengalaman = Pengalamans::where('id_pengalaman',$id_pengalaman)->first();
    $this->id_pengalaman = $pengalaman->id_pengalaman; 
    $this->tahun_pengalaman = $pengalaman->tahun_pengalaman; 
    $this->pekerjaan_pengalaman = $pengalaman->pekerjaan_pengalaman; 
    $this->tempat_pengalaman = $pengalaman->tempat_pengalaman; 
    $this->posisi_pengalaman = $pengalaman->posisi_pengalaman; 
    $this->deskripsi_pengalaman = $pengalaman->deskripsi_pengalaman; 
  }

  public function delete(){
    if($this->id_pengalaman){
      $pengalaman = Pengalamans::find($this->id_pengalaman);
      $pengalaman->delete();
      $this->emit('pengalamanDeleted');
    }
  }

  public function render()
  {
    $cari = '%'.$this->cari.'%';
    $pengalamans = Pengalamans::where('tahun_pengalaman','Like',$cari)
    ->orWhere('pekerjaan_pengalaman','Like',$cari)
    ->orWhere('tempat_pengalaman','Like',$cari)
    ->orWhere('posisi_pengalaman','Like',$cari)
    ->orWhere('deskripsi_pengalaman','Like',$cari)->latest()->paginate(5);
    return view('admin.pengalaman',['pengalamans'=>$pengalamans])->layout('layouts.admin');
  }
}
