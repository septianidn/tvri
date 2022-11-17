@extends('layouts.template')
@section('page_title', 'Halaman Barang')
    


@section('content')
<div class="col-lg-8">
    <button class="btn btn-primary" onclick="" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah Data</button>
    <div id="read" class="mt-3">

    </div>
</div>

<!-- Button trigger modal -->




<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
         <div class="alert alert-danger" style="display:none"></div> 

                    <form class="barang-upload" method="post" action="{{ route('barang_store') }}"> 

                        @csrf 

                        <div class="form-group"> 

                            <label>Nama Barang</label> 

                            <input type="text" name="nama" id="nama" class="form-control"/> 

                        </div>   

                        <div class="form-group"> 

                            <label>Jenis Barang</label> 

                            <input type="text" name="jenis" id="jenis" class="form-control"/> 

                        </div> 

                        <div class="form-group"> 

                            <label>Merk Barang</label> 

                            <input type="text" name="merk" id="merk" class="form-control"/> 

                        </div> 

                        <div class="form-group"> 

                            <label>Jumlah Barang</label> 

                            <input type="text" name="jumlah" id="jumlah" class="form-control"/> 

                        </div> 

                    </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeForm">Close</button>
        <button type="button" class="btn btn-primary" id="formSubmit">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  $(document).ready(function(){ 
    
    $("#tabel").DataTable();

    readData();

    function readData(){
      $.get("{{route('read')}}", {}, function (data, status) {
          $('#read').html(data);
        }
      );
    }

            $('#formSubmit').click(function(e){ 

                e.preventDefault(); 

                $.ajaxSetup({ 

                    headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }

                }); 

                $.ajax({ 

                    url: "{{ route('barang_store') }}", 

                    method: 'post', 

                    data: { 

                        nama: $('#nama').val(), 
                        jenis: $('#jenis').val(), 
                        merk: $('#merk').val(), 
                        jumlah: $('#jumlah').val(), 


                    }, 

                    success: function(response){ 

                      if(response.status == 200){
                        Swal.fire(
                          'Added!',
                          'Data Barang Berhasil Ditambahkan',
                          'success'
                        )
                          $('.alert-danger').hide(); 

                          $('#exampleModal').modal('hide'); 
                          $('.btn-close').click();
                          readData();
                            
                          }
                        else{
                            $('.alert-danger').html(''); 

                            $.each(response.errors, function(key, value){ 

                                $('.alert-danger').show(); 

                                $('.alert-danger').append('<li>'+value+'</li>'); 

                            }); 

                        } 
                      }

                      

                      

                    

                }); 

            }); 

        }); 



  
</script>
@endsection

