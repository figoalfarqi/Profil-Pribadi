<div>
@extends('admin.master')
@section('title', 'data sosial_media')
@section('menuSosialMedia', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data sosial_media</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row"style=" float: right;margin-bottom: 10px;width:40%; min-width: 300px;">
                  <label class="col-sm-3 col-md-2 col-form-label">Cari : </label>
                  <div class="col-sm-9 col-md-10">
                    <input type="text"  class="form-control" placeholder="Cari.." wire:model.debounce.200ms="cari" >
                  </div>
                </div>
                <table id="tabelData" class="table table-bordered table-hover" style="margin-bottom: 15px;">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Sosial Media</th>
                    <th>Nama Sosial Media</th>
                    <th>Url Sosial Media</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($sosial_medias as $sosial_media)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$sosial_media->jenis_sosial_media}}</td>
                    <td>{{$sosial_media->nama_sosial_media}}</td>
                    <td>{{$sosial_media->url_sosial_media}}</td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$sosial_media->id_sosial_media}})" data-toggle="modal" data-target="#modalEditSosialMedia">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$sosial_media->id_sosial_media}})" data-toggle="modal" data-target="#modalHapusSosialMedia">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$sosial_medias->links()}}
                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahSosialMedia" wire:click.prevent="tambah()">Tambah</button>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('tambahan')
<!-- ./wrapper -->
    <div wire:ignore.self  class="modal fade" id="modalTambahSosialMedia">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="judulModal">Tambah Sosial Media</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post">
              <input type="hidden" id="id_sosial_media" name="id_sosial_media">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Sosial Media</label>
                  <div class="col-sm-10">
                    <input type="text" name="jenis_sosial_media" class="form-control" placeholder="Jenis Sosial Media" wire:model="jenis_sosial_media">
                    @error('jenis_sosial_media') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Sosial Media</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_sosial_media" class="form-control" placeholder="Nama Sosial Media" wire:model="nama_sosial_media">
                    @error('nama_sosial_media') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Url Sosial Media</label>
                  <div class="col-sm-10">
                    <input type="text" name="url_sosial_media" class="form-control" placeholder="Url Sosial Media" wire:model="url_sosial_media">
                    @error('sosial_media') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnSimpan" style="margin-right: 0%;width:20%" wire:click.prevent="store()">Simpan</button>
          </div>
            </form>
        </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
    </div>

    <div wire:ignore.self class="modal fade" id="modalEditSosialMedia">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="judulModal">Edit Sosial Media</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post">
              <input type="hidden" id="id_sosial_media" name="id_sosial_media" wire:model="id_sosial_media">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Sosial Media</label>
                  <div class="col-sm-10">
                  <input type="text" name="jenis_sosial_media" class="form-control" placeholder="Jenis Sosial Media" wire:model="jenis_sosial_media">
                    @error('sosial_media') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Sosial Media</label>
                  <div class="col-sm-10">
                  <input type="text" name="nama_sosial_media" class="form-control" placeholder="Nama Sosial Media" wire:model="nama_sosial_media">
                    @error('sosial_media') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Url Sosial Media</label>
                  <div class="col-sm-10">
                  <input type="text" name="url_sosial_media" class="form-control" placeholder="Url Sosial Media" wire:model="url_sosial_media">
                    @error('sosial_media') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnSimpan" style="margin-right: 0%;width:20%" wire:click.prevent="update()">Edit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
      </div>

      <div wire:ignore.self class="modal fade" id="modalHapusSosialMedia">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" id="hapussosial_media" enctype="multipart/form-data">
                <input type="hidden" name="id_sosial_media" wire:model="id_sosial_media">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Sosial Media</label>
                    <div class="col-sm-10">
                      <input type="text" name="jenis_sosial_media" class="form-control" wire:model="jenis_sosial_media" placeholder="Jenis Sosial Media" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Sosial Media</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_sosial_media" class="form-control" wire:model="nama_sosial_media" placeholder="Nama Sosial Media" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Url Sosial Media</label>
                    <div class="col-sm-10">
                      <input type="text" name="url_sosial_media" class="form-control" wire:model="url_sosial_media" placeholder="Url Sosial Media" readonly="">
                    </div>
                  </div>
                  
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="hbtnHapus" style="margin-right: 0%;width:20%" wire:click.prevent="delete()">Hapus</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endsection