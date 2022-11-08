@extends('layouts.template')
@section('page_title', 'Halaman Barang')
    


@section('content')
<div class="col-lg-8">
    <button class="btn btn-primary" onclick="" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah Data</button>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang</h1>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" id="close">X</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="row mt-3">
            <label for="nama">Nama Barang</label>
            <input type="text" name="nama" id="nama" placeholder="Nama barang..." class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group">
            <div class="row mt-3">
              <input type="text" name="jenis" id="jenis" placeholder="Jenis barang..." class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="row mt-3">

              <input type="text" name="merk" id="merk" placeholder="Merk barang..." class="form-control">
            </div>
        </div>
        <div class="form-group">
          <div class="row mt-3">

            <input type="number" name="jumlah" id="jumlah" placeholder="Jumlah barang..." class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="" id="brg_tambah">Tambah Data</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  $(document).ready(function(){

    function read(){

    }

    
});
$(document).on('click','#brg_tambah' , function (e) {
      e.preventDefault();
      var data = {
        'nama' : $('#nama').val(),
        'jenis' : $('#jenis').val(),
        'merk' : $('#merk').val(),
        'jumlah' : $('#jumlah').val(),
      }
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        type: "POST",
        url: "{{route('barang_store')}}",
        data: data,
        success: function (response) {
          console.log(response);
          // $("#exampleModal").modal("hide");
          //$("#close").click();

          //
        }
      });
    });

  
</script>
@endsection

