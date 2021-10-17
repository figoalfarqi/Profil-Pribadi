<div>
@extends('admin.master')
@section('title', 'data pendidikan')
@section('menuPendidikan', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pendidikan</h3>
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
                    <th>Tahun pendidikan</th>
                    <th>Tempat pendidikan</th>
                    <th>Jurusan pendidikan</th>
                    <th>Deskripsi pendidikan</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($pendidikans as $pendidikan)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$pendidikan->tahun_pendidikan}}</td>
                    <td>{{$pendidikan->tempat_pendidikan}}</td>
                    <td>{{$pendidikan->jurusan_pendidikan}}</td>
                    <td>{{$pendidikan->deskripsi_pendidikan}}</td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$pendidikan->id_pendidikan}})" data-toggle="modal" data-target="#modalEditPendidikan">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$pendidikan->id_pendidikan}})" data-toggle="modal" data-target="#modalHapusPendidikan">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$pendidikans->links()}}
                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahPendidikan" wire:click.prevent="tambah()">Tambah</button>
                
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
    <div wire:ignore.self  class="modal fade" id="modalTambahPendidikan">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="judulModal">Tambah Pendidikan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post">
              <input type="hidden" id="id_pendidikan" name="id_pendidikan">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun Pendidikan</label>
                  <div class="col-sm-10">
                    <input type="text" name="tahun_pendidikan" class="form-control" placeholder="Tahun Pendidikan" wire:model="tahun_pendidikan">
                    @error('tahun_pendidikan') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat Pendidikan</label>
                  <div class="col-sm-10">
                  <input type="text" name="tempat_pendidikan" class="form-control" placeholder="Tempat Pendidikan" wire:model="tempat_pendidikan">
                    @error('tempat_pendidikan') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jurusan Pendidikan</label>
                  <div class="col-sm-10">
                    <input type="text" name="jurusan_pendidikan" class="form-control" placeholder="Jurusan Pendidikan" wire:model="jurusan_pendidikan">
                    @error('jurusan_pendidikan') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Deskripsi Pendidikan</label>
                  <div class="col-sm-10">
                  <input type="text" name="deskripsi_pendidikan" class="form-control" placeholder="Deskripsi Pendidikan" wire:model="deskripsi_pendidikan">
                    @error('deskripsi_pendidikan') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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

    <div wire:ignore.self class="modal fade" id="modalEditPendidikan">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="judulModal">Edit Pendidikan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post">
              <input type="hidden" id="id_pendidikan" name="id_pendidikan" wire:model="id_pendidikan">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun Pendidikan</label>
                  <div class="col-sm-10">
                  <input type="text" name="tahun_pendidikan" class="form-control" placeholder="Tahun Pendidikan" wire:model="tahun_pendidikan">
                    @error('tahun_pendidikan') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat Pendidikan</label>
                  <div class="col-sm-10">
                  <input type="text" name="tempat_pendidikan" class="form-control" placeholder="Tempat Pendidikan" wire:model="tempat_pendidikan">
                    @error('tempat_pendidikan') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jurusan Pendidikan</label>
                  <div class="col-sm-10">
                  <input type="text" name="jurusan_pendidikan" class="form-control" placeholder="Jurusan Pendidikan" wire:model="jurusan_pendidikan">
                    @error('jurusan_pendidikan') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Deskripsi Pendidikan</label>
                  <div class="col-sm-10">
                  <input type="text" name="deskripsi_pendidikan" class="form-control" placeholder="Deskripsi Pendidikan" wire:model="deskripsi_pendidikan">
                    @error('deskripsi_pendidikan') 
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

      <div wire:ignore.self class="modal fade" id="modalHapusPendidikan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" id="hapuspendidikan" enctype="multipart/form-data">
                <input type="hidden" name="id_pendidikan" wire:model="id_pendidikan">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Pendidikan</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_pendidikan" class="form-control" wire:model="tahun_pendidikan" placeholder="Tahun Pendidikan" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat Pendidikan</label>
                    <div class="col-sm-10">
                      <input type="text" name="tempat_pendidikan" class="form-control" wire:model="tempat_pendidikan" placeholder="Tempat Pendidikan" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jurusan Pendidikan</label>
                    <div class="col-sm-10">
                      <input type="text" name="jurusan_pendidikan" class="form-control" wire:model="jurusan_pendidikan" placeholder="Jurusan Pendidikan" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Pendidikan</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_pendidikan" class="form-control" wire:model="deskripsi_pendidikan" placeholder="Deskripsi Pendidikan" readonly="">
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