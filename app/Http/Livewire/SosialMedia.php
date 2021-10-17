<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SosialMedia as SosialMedias;


class SosialMedia extends Component
{

  use WithPagination;
  public $id_sosial_media;
  public $jenis_sosial_media;
  public $nama_sosial_media;
  public $url_sosial_media;
  public $cari; 

  protected $paginationTheme = 'bootstrap';

  protected $messages = [
    'jenis_sosial_media.required' => 'Data jenis sosial media Harus diisi',
    'nama_sosial_media.required' => 'Data nama sosial media Harus diisi',
  ];


  // AdminMiddleware.middleware('admin');

  public function resetInputFields(){
    $this->id_sosial_media = "";
    $this->jenis_sosial_media = "";
    $this->nama_sosial_media = "";
    $this->url_sosial_media = "";
  }

  public function updated($fields){
    $this->validateOnly($fields,[
      'jenis_sosial_media' => 'required',
      'nama_sosial_media' => 'required',
    ]);

  }

  public function tambah(){
    $this->resetInputFields();
  }

  public function store()
  {
    $validateData = $this->validate([
      'jenis_sosial_media' => 'required',
      'nama_sosial_media' => 'required',
    ]);
    $validateData['url_sosial_media']= $this->url_sosial_media;
    SosialMedias::create($validateData);
    $this->resetInputFields();
    $this->emit('sosialMediaAdded');
  }


  public function edit($id_sosial_media){
    $sosial_media = SosialMedias::where('id_sosial_media',$id_sosial_media)->first();
    $this->id_sosial_media = $sosial_media->id_sosial_media; 
    $this->jenis_sosial_media = $sosial_media->jenis_sosial_media; 
    $this->nama_sosial_media = $sosial_media->nama_sosial_media; 
    $this->url_sosial_media = $sosial_media->url_sosial_media; 
  }

  public function update(){
    $this->validate([
      'jenis_sosial_media' => 'required',
      'nama_sosial_media' => 'required',
    ]);
    if($this->id_sosial_media){
      $sosial_media = SosialMedias::find($this->id_sosial_media);
      $sosial_media->update([
        'jenis_sosial_media' => $this->jenis_sosial_media,
        'nama_sosial_media' => $this->nama_sosial_media,
        'url_sosial_media' => $this->url_sosial_media,
      ]);
      $this->emit('sosialMediaUpdated');
    }
  }

  public function hapus($id_sosial_media){
    $sosial_media = SosialMedias::where('id_sosial_media',$id_sosial_media)->first();
    $this->id_sosial_media = $sosial_media->id_sosial_media; 
    $this->jenis_sosial_media = $sosial_media->jenis_sosial_media; 
    $this->nama_sosial_media = $sosial_media->nama_sosial_media; 
    $this->url_sosial_media = $sosial_media->url_sosial_media; 
  }

  public function delete(){
    if($this->id_sosial_media){
      $sosial_media = SosialMedias::find($this->id_sosial_media);
      $sosial_media->delete();
      $this->emit('sosialMediaDeleted');
    }
  }

  public function render()
  {
    $cari = '%'.$this->cari.'%';
    $sosial_medias = SosialMedias::where('jenis_sosial_media','Like',$cari)
    ->orWhere('nama_sosial_media','Like',$cari)
    ->orWhere('url_sosial_media','Like',$cari)->latest()->paginate(5);
    return view('admin.sosial-media',['sosial_medias'=>$sosial_medias])->layout('layouts.admin');
  }

}
