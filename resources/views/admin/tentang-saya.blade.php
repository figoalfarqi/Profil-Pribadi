<div>
    
@extends('admin.master')
@section('title', 'data tentang saya')
@section('menuTentangSaya', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data tentang_saya</h3>
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
                    <th>Judul Tentang Saya</th>
                    <th>Deskripsi Tentang Saya</th>
                    <th>Image Tentang Saya</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($tentang_sayas as $tentang_saya)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$tentang_saya->judul_tentang_saya}}</td>
                    <td>{{$tentang_saya->deskripsi_tentang_saya}}</td>
                    <td><img src="{{asset('image/image_tentang_saya/'.$tentang_saya->image_tentang_saya)}}" style="height:100px;max-width:600px" alt="tentang_saya Image"></td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$tentang_saya->id_tentang_saya}})" data-toggle="modal" data-target="#modalEditTentangSaya">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$tentang_saya->id_tentang_saya}})" data-toggle="modal" data-target="#modalHapusTentangSaya">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$tentang_sayas->links()}}
                <button id="btnTambah" type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahTentangSaya" wire:click.prevent="tambah()">Tambah</button>
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
<div wire:ignore.self class="modal fade" id="modalTambahTentangSaya">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Tambah Tentang Saya</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="store" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_tentang_saya" wire:model="id_tentang_saya">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Tentang Saya</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_tentang_saya" class="form-control" placeholder="judul_tentang_saya" wire:model="judul_tentang_saya">
                      @error('judul_tentang_saya') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Tentang Saya</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_tentang_saya" class="form-control" placeholder="Deskripsi Tentang Saya" wire:model="deskripsi_tentang_saya">
                      @error('deskripsi_tentang_saya') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Image Tentang Saya</label>
                    <div class="col-sm-10">
                      <div class="custom-file"> 
                        <input type="file" name ="image_tentang_saya" class="custom-file-input pimage_tentang_sayatentang_saya"  wire:model="image_tentang_saya">
                        <label class="custom-file-label" for="image_tentang_saya">Choose file</label>
                      </div>
                      @error('image_tentang_saya') <span class="text-danger">{{$message}}</span> @enderror
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
      <div wire:ignore.self class="modal fade" id="modalEditTentangSaya">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Edit Tentang Saya</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="update" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_tentang_saya" wire:model="id_tentang_saya">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Tentang Saya</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_tentang_saya" class="form-control" placeholder="judul_tentang_saya" wire:model="judul_tentang_saya">
                      @error('judul_tentang_saya') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Tentang Saya</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_tentang_saya" class="form-control" placeholder="Deskripsi Tentang Saya" wire:model="deskripsi_tentang_saya">
                      @error('deskripsi_tentang_saya') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Image Tentang Saya</label>
                    <div class="col-sm-10">
                      <div class="custom-file"> 
                        <input type="file" name ="image_tentang_saya" class="custom-file-input pimage_tentang_sayatentang_saya"  wire:model="image_tentang_saya">
                        <label class="custom-file-label" for="image_tentang_saya">Choose file</label>
                      </div>
                      @error('image_tentang_saya') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">image Saat ini</label> 
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <img src="http://localhost:8000/image/image_tentang_saya/{{ $image_saat_ini }}" style="margin-bottom: 100px;height:100px;max-width:600px">
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
      <div wire:ignore.self class="modal fade" id="modalHapusTentangSaya">
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
                <input type="hidden" id="hid_tentang_saya" name="id_tentang_saya" wire:model="id_tentang_saya">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Tentang Saya</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_tentang_saya" class="form-control" placeholder="judul_tentang_saya" wire:model="judul_tentang_saya" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Tentang Saya</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_tentang_saya" class="form-control" placeholder="Deskripsi Tentang Saya" wire:model="deskripsi_tentang_saya" readonly="">
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">image Saat ini</label> 
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <img src="http://localhost:8000/image/image_tentang_saya/{{ $image_saat_ini }}" style="margin-bottom: 100px;height:100px;max-width:600px">
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
                 @this.set('status_tentang_saya', data);
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