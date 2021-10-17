<div>
    
@extends('admin.master')
@section('title', 'data profil')
@section('menuProfil', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data profil</h3>
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
                    <th>Nama</th>
                    <th>Pekerjaan</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($profils as $profil)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$profil->pekerjaan}}</td>
                    <td>{{$profil->pekerjaan}}</td>
                    <td>{{$profil->alamat}}</td>
                    <td><img src="{{asset('image/foto_profil/'.$profil->foto)}}" style="height:100px;max-width:600px" alt="profil Image"></td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$profil->id_profil}})" data-toggle="modal" data-target="#modalEditprofil">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$profil->id_profil}})" data-toggle="modal" data-target="#modalHapusprofil">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$profils->links()}}
                <button id="btnTambah" type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahprofil" wire:click.prevent="tambah()">Tambah</button>
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
    <!-- validasi -->
    @section('tambahan')

<!-- ./wrapper -->
<div wire:ignore.self class="modal fade" id="modalTambahprofil">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Tambah Profil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="store" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_profil" wire:model="id_profil">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" placeholder="Nama" wire:model="nama">
                      @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                      <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" wire:model="pekerjaan">
                      @error('pekerjaan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Profil</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_profil" class="form-control" placeholder="Judul Profil"  wire:model="judul_profil">
                      @error('judul_profil') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Profil</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_profil" class="form-control" placeholder="Deskripsi Profil" wire:model="deskripsi_profil">
                      @error('tanggal_lahir_profil') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" wire:model="tanggal_lahir">
                      @error('tanggal_lahir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon" wire:model="nomor_telepon">
                      @error('nomor_telepon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" name="alamat" class="form-control" placeholder="alamat" wire:model="alamat">
                      @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" placeholder="email" wire:model="email">
                      @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <div class="custom-file"> 
                        <input type="file" name ="foto" class="custom-file-input pFotoprofil"  wire:model="foto">
                        <label class="custom-file-label" for="foto">Choose file</label>
                      </div>
                      @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btnSimpan" style="margin-right: 0%;width:20%">Simpan</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div wire:ignore.self class="modal fade" id="modalEditprofil">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Edit Profil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="update" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_profil" wire:model="id_profil">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" placeholder="Nama" wire:model="nama">
                      @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                      <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" wire:model="pekerjaan">
                      @error('pekerjaan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Profil</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_profil" class="form-control" placeholder="Judul Profil"  wire:model="judul_profil">
                      @error('judul_profil') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Profil</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_profil" class="form-control" placeholder="Deskripsi Profil" wire:model="deskripsi_profil">
                      @error('deskripsi_profil') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" wire:model="tanggal_lahir">
                      @error('tanggal_lahir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon" wire:model="nomor_telepon">
                      @error('nomor_telepon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" name="alamat" class="form-control" placeholder="alamat" wire:model="alamat">
                      @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" placeholder="email" wire:model="email">
                      @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <div class="custom-file"> 
                        <input type="file" name ="foto" class="custom-file-input pFotoprofil"  wire:model="foto">
                        <label class="custom-file-label" for="foto">Choose file</label>
                      </div>
                      @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">Foto Saat ini</label> 
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <img src="http://localhost:8000/image/foto_profil/{{ $foto_saat_ini }}" style="margin-bottom: 100px;height:100px;max-width:600px">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="margin-right: 0%;width:20%">Edit</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div wire:ignore.self class="modal fade" id="modalHapusprofil">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" id="hid_profil" name="id_profil" wire:model="id_profil">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" placeholder="Nama" wire:model="nama" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                      <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" wire:model="pekerjaan" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Profil</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_profil" class="form-control" placeholder="Judul Profil"  wire:model="judul_profil" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Profil</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_profil" class="form-control" placeholder="Deskripsi Profil" wire:model="deskripsi_profil" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" wire:model="tanggal_lahir" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon" wire:model="nomor_telepon" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" name="alamat" class="form-control" placeholder="Alamat" wire:model="alamat" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" placeholder="Email" wire:model="email" readonly="">
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">Foto Saat ini</label> 
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <img src="http://localhost:8000/image/foto_profil/{{ $foto_saat_ini }}" style="margin-bottom: 100px;height:100px;max-width:600px">
                      </div>
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
@push('scripts')
<script>
  $(function () {
    //Initialize Select2 Elements
    Livewire.hook('message.processed', (message, component) => {
      $('.select2bs4').select2({
      
        theme: 'bootstrap4',
        placeholder: "---Pilih---",
      });
    });
    $('.pAgama').on('change', function (e) {
                let data = $(this).val();
                 @this.set('id_agama', data);
            });

    $('.pJabatan').on('change', function (e) {
                let data = $(this).val();
                 @this.set('id_jabatan', data);
            });
    $('.pStatus').on('change', function (e) {
                let data = $(this).val();
                 @this.set('status_profil', data);
            });
    //Date picker
    $('#reservationdate').datetimepicker({
        locale: 'id',
        format: 'DD MMMM YYYY'
    });

    bsCustomFileInput.init();
    $('.select2bs4').select2({
      
      theme: 'bootstrap4',
      placeholder: "---Pilih---",
    });

  });

</script>
@endpush
      @endsection