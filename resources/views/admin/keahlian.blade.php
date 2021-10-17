<div>
@extends('admin.master')
@section('title', 'data keahlian')
@section('menuKeahlian', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Keahlian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row"style=" float: right;margin-bottom: 10px;width:40%; min-width: 300px;">
                  <label class="col-sm-3 col-md-2 col-form-label">Cari : </label>
                  <div class="col-sm-9 col-md-10">
                    <input type="text" class="form-control" placeholder="Cari.." wire:model.debounce.200ms="cari" >
                  </div>
                </div>
                <table id="tabelData" class="table table-bordered table-hover" style="margin-bottom: 15px;">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Keahlian</th>
                    <th>Nilai Keahlian</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($keahlians as $keahlian)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$keahlian->nama_keahlian}}</td>
                    <td>{{$keahlian->nilai_keahlian}}</td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$keahlian->id_keahlian}})" data-toggle="modal" data-target="#modalEditKeahlian">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$keahlian->id_keahlian}})" data-toggle="modal" data-target="#modalHapusKeahlian">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$keahlians->links()}}
                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahKeahlian" wire:click.prevent="tambah()">Tambah</button>
                
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
    <div wire:ignore.self  class="modal fade" id="modalTambahKeahlian">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="judulModal">Tambah Keahlian</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post">
              <input type="hidden" id="id_keahlian" name="id_keahlian">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Keahlian</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_keahlian" class="form-control" placeholder="Nama Keahlian" wire:model="nama_keahlian">
                    @error('nama_keahlian') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nilai Keahlian</label>
                  <div class="col-sm-10">
                    <input type="text" name="nilai_keahlian" class="form-control" placeholder="Nilai Keahlian" wire:model="nilai_keahlian">
                    @error('nilai_keahlian') <span class="text-danger">{{$message}}</span> @enderror
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

    <div wire:ignore.self class="modal fade" id="modalEditKeahlian">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="judulModal">Edit Keahlian</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post">
              <input type="hidden" id="id_keahlian" name="id_keahlian" wire:model="id_keahlian">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Keahlian</label>
                  <div class="col-sm-10">
                  <input type="text" name="nama_keahlian" class="form-control" placeholder="Nama Keahlian" wire:model="nama_keahlian">
                    @error('nama_keahlian') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nilai Keahlian</label>
                  <div class="col-sm-10">
                  <input type="text" name="nilai_keahlian" class="form-control" placeholder="Nilai Keahlian" wire:model="nilai_keahlian">
                    @error('nilai_keahlian') 
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

      <div wire:ignore.self class="modal fade" id="modalHapusKeahlian">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" id="hapuskeahlian" enctype="multipart/form-data">
                <input type="hidden" name="id_keahlian" wire:model="id_keahlian">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Keahlian</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_keahlian" class="form-control" wire:model="nama_keahlian" placeholder="Nama Keahlian" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nilai Keahlian</label>
                    <div class="col-sm-10">
                      <input type="text" name="nilai_keahlian" class="form-control" wire:model="nilai_keahlian" placeholder="Nilai Keahlian" readonly="">
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