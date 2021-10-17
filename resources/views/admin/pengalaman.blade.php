<div>
@extends('admin.master')
@section('title', 'data pengalaman')
@section('menuPengalaman', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengalaman</h3>
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
                    <th>Tahun Pengalaman</th>
                    <th>Pekerjaan Pengalaman</th>
                    <th>Tempat Pengalaman</th>
                    <th>Posisi Pengalaman</th>
                    <th>Deskripsi Pengalaman</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($pengalamans as $pengalaman)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$pengalaman->tahun_pengalaman}}</td>
                    <td>{{$pengalaman->pekerjaan_pengalaman}}</td>
                    <td>{{$pengalaman->tempat_pengalaman}}</td>
                    <td>{{$pengalaman->posisi_pengalaman}}</td>
                    <td>{{$pengalaman->deskripsi_pengalaman}}</td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$pengalaman->id_pengalaman}})" data-toggle="modal" data-target="#modalEditPengalaman">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$pengalaman->id_pengalaman}})" data-toggle="modal" data-target="#modalHapusPengalaman">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$pengalamans->links()}}
                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahPengalaman" wire:click.prevent="tambah()">Tambah</button>
                
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
    <div wire:ignore.self  class="modal fade" id="modalTambahPengalaman">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="judulModal">Tambah Pengalaman</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post">
              <input type="hidden" id="id_pengalaman" name="id_pengalaman">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun Pengalaman</label>
                  <div class="col-sm-10">
                    <input type="text" name="tahun_pengalaman" class="form-control" placeholder="Tahun Pengalaman" wire:model="tahun_pengalaman">
                    @error('tahun_pengalaman') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pekerjaan Pengalaman</label>
                  <div class="col-sm-10">
                    <input type="text" name="pekerjaan_pengalaman" class="form-control" placeholder="Pekerjaan Pengalaman" wire:model="pekerjaan_pengalaman">
                    @error('pekerjaan_pengalaman') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat Pengalaman</label>
                  <div class="col-sm-10">
                  <input type="text" name="tempat_pengalaman" class="form-control" placeholder="Tempat Pengalaman" wire:model="tempat_pengalaman">
                    @error('tempat_pengalaman') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Posisi Pengalaman</label>
                  <div class="col-sm-10">
                  <input type="text" name="posisi_pengalaman" class="form-control" placeholder="Posisi Pengalaman" wire:model="posisi_pengalaman">
                    @error('posisi_pengalaman') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Deskripsi Pengalaman</label>
                  <div class="col-sm-10">
                  <input type="text" name="deskripsi_pengalaman" class="form-control" placeholder="Deskripsi Pengalaman" wire:model="deskripsi_pengalaman">
                    @error('deskripsi_pengalaman') 
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

    <div wire:ignore.self class="modal fade" id="modalEditPengalaman">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="judulModal">Edit Pengalaman</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post">
              <input type="hidden" id="id_pengalaman" name="id_pengalaman" wire:model="id_pengalaman">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun Pengalaman</label>
                  <div class="col-sm-10">
                  <input type="text" name="tahun_pengalaman" class="form-control" placeholder="Tahun Pengalaman" wire:model="tahun_pengalaman">
                    @error('tahun_pengalaman') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pekerjaan Pengalaman</label>
                  <div class="col-sm-10">
                  <input type="text" name="pekerjaan_pengalaman" class="form-control" placeholder="Pekerjaan Pengalaman" wire:model="pekerjaan_pengalaman">
                    @error('pekerjaan_pengalaman') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat Pengalaman</label>
                  <div class="col-sm-10">
                  <input type="text" name="tempat_pengalaman" class="form-control" placeholder="Tempat Pengalaman" wire:model="tempat_pengalaman">
                    @error('tempat_pengalaman') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Posisi Pengalaman</label>
                  <div class="col-sm-10">
                  <input type="text" name="posisi_pengalaman" class="form-control" placeholder="Posisi Pengalaman" wire:model="posisi_pengalaman">
                    @error('posisi_pengalaman') 
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Deskripsi Pengalaman</label>
                  <div class="col-sm-10">
                  <input type="text" name="deskripsi_pengalaman" class="form-control" placeholder="Deskripsi Pengalaman" wire:model="deskripsi_pengalaman">
                    @error('deskripsi_pengalaman') 
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

      <div wire:ignore.self class="modal fade" id="modalHapusPengalaman">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" id="hapuspengalaman" enctype="multipart/form-data">
                <input type="hidden" name="id_pengalaman" wire:model="id_pengalaman">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_pengalaman" class="form-control" wire:model="tahun_pengalaman" placeholder="Tahun Pengalaman" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" name="pekerjaan_pengalaman" class="form-control" wire:model="pekerjaan_pengalaman" placeholder="Pekerjaan Pengalaman" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" name="tempat_pengalaman" class="form-control" wire:model="tempat_pengalaman" placeholder="Tempat Pengalaman" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Posisi Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" name="posisi_pengalaman" class="form-control" wire:model="posisi_pengalaman" placeholder="Posisi Pengalaman" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_pengalaman" class="form-control" wire:model="deskripsi_pengalaman" placeholder="Deskripsi Pengalaman" readonly="">
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