
@if ($barang->isNotEmpty())
<table class="table table-stripped table-sm text-center align-middle" id="tabel">
  <thead>
    <tr>
      <th>NO</th>
      <th>Nama Barang</th>
      <th>Jenis Barang</th>
      <th>Merk</th>
      <th>Jumlah</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($barang as $brg)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$brg->nama_barang}}</td>
        <td>{{$brg->jenis}}</td>
        <td>{{$brg->merk}}</td>
        <td>{{$brg->qty}}</td>
        <td><a href="#" class="text-success mx-1 editIcon">Edit<i class="bi bi-pencil-square"></i></a></td>
        <td><a href="{{route('delete/barang', [$brg->id])}}">Hapus<i class="bi-tras"></i></a></td>
    </tr>
    @endforeach

  </tbody>
</table> 
@else
    
@endif