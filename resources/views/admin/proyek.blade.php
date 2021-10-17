<div>
    
@extends('admin.master')
@section('title', 'data proyek')
@section('menuProyek', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data proyek</h3>
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
                    <th>Judul Proyek</th>
                    <th>Deskripsi Proyek</th>
                    <th>Image Proyek</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($proyeks as $proyek)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$proyek->judul_proyek}}</td>
                    <td>{{$proyek->deskripsi_proyek}}</td>
                    <td><img src="{{asset('image/image_proyek/'.$proyek->image_proyek)}}" style="height:100px;max-width:600px" alt="proyek Image"></td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$proyek->id_proyek}})" data-toggle="modal" data-target="#modalEditProyek">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$proyek->id_proyek}})" data-toggle="modal" data-target="#modalHapusProyek">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$proyeks->links()}}
                <button id="btnTambah" type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahProyek" wire:click.prevent="tambah()">Tambah</button>
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
<div wire:ignore.self class="modal fade" id="modalTambahProyek">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Tambah proyek</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="store" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_proyek" wire:model="id_proyek">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Proyek</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_proyek" class="form-control" placeholder="Judul Proyek" wire:model="judul_proyek">
                      @error('judul_proyek') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Proyek</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_proyek" class="form-control" placeholder="Deskripsi Proyek" wire:model="deskripsi_proyek">
                      @error('deskripsi_proyek') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">image_proyek</label>
                    <div class="col-sm-10">
                      <div class="custom-file"> 
                        <input type="file" name ="image_proyek" class="custom-file-input pimage_proyekproyek"  wire:model="image_proyek">
                        <label class="custom-file-label" for="image_proyek">Choose file</label>
                      </div>
                      @error('image_proyek') <span class="text-danger">{{$message}}</span> @enderror
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
      <div wire:ignore.self class="modal fade" id="modalEditProyek">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Edit proyek</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="update" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_proyek" wire:model="id_proyek">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Proyek</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_proyek" class="form-control" placeholder="Judul Proyek" wire:model="judul_proyek">
                      @error('judul_proyek') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Proyek</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_proyek" class="form-control" placeholder="Deskripsi Proyek" wire:model="deskripsi_proyek">
                      @error('deskripsi_proyek') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">image_proyek</label>
                    <div class="col-sm-10">
                      <div class="custom-file"> 
                        <input type="file" name ="image_proyek" class="custom-file-input pimage_proyekproyek"  wire:model="image_proyek">
                        <label class="custom-file-label" for="image_proyek">Choose file</label>
                      </div>
                      @error('image_proyek') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">image proyek Saat ini</label> 
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <img src="http://localhost:8000/image/image_proyek/{{ $image_saat_ini }}" style="margin-bottom: 100px;height:100px;max-width:600px">
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
      <div wire:ignore.self class="modal fade" id="modalHapusProyek">
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
                <input type="hidden" id="hid_proyek" name="id_proyek" wire:model="id_proyek">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Proyek</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_proyek" class="form-control" placeholder="Judul Proyek" wire:model="judul_proyek" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Proyek</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_proyek" class="form-control" placeholder="Deskripsi Proyek" wire:model="deskripsi_proyek" readonly="">
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">image_proyek Saat ini</label> 
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <img src="http://localhost:8000/image/image_proyek/{{ $image_saat_ini }}" style="margin-bottom: 100px;height:100px;max-width:600px">
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
                 @this.set('status_proyek', data);
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