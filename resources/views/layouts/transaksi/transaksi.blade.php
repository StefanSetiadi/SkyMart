@extends('main')

@section('container')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Transaksi</h4>
        <form action="{{route('tambahbrgtransaksistore')}}" method="POST">
          @csrf
          <input type="text" hidden name="id_user" value="{{Auth::user()->id_user}}">
          <div class="mt-2">
            <div class="row">
              <div class="col-md-6">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Barang" onkeydown="tampil(event)" required autofocus>
              </div>
              <div class="col-md-6">
                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Barang" required>
              </div>
              <button type="submit" hidden></button>
            </form>
            
            <div class="col-md-6">
              <a href="{{route('bayartransaksi')}}" class="btn btn-success mt-2">Bayar</a>  
            </div>
            <div class="col-md-6">
              <h1><small class="text-muted">Total Harga : </small></h1>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
              <h1><small class="text-muted" id='subtotal'>Rp. 0</small></h1>
            </div>
          </div>
        <div class="table-responsive mt-2">
          <table class="table" id="tabel_barang">
            <thead>
              <tr>
                <th>Barang</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>

        <div class="table-responsive mt-5">
          <table class="table" id="tabel_transaksi">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

              @php
              $no = 1;   
              @endphp
              @foreach($data as $row)
              <tr>
                <td scope="row">{{$no}}</td>
                <td>{{$row->nama_barang}}</td>
                <td>{{$row->jumlah_barang}}</td>
                <td>{{optional($barang->where('id_barang', $row->id_barang)->first())->harga}}</td>
                <td>{{$row->subtotal}}</td>
                <td class="text-center">
                  <a href="/hapusbrgtransaksi{{$row->id_transaksi}}" class="btn btn-danger">Delete</a>
              </td>
              </tr>
              @php
              $no++;
              @endphp
              @endforeach

              @if($no==1)
              <tr>
                <td colspan="6" class="text-center table-danger">Data Tidak Ditemukan !!!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php
  $databarang = $barang->map(function ($item) {
    return [
        'nama' => $item->nama,
        'harga' => $item->harga,
    ];
  })->toArray();
  $databarang = json_encode($databarang);  
  ?>

  <script>
    var txtTotal = document.getElementById("subtotal");    
    var table = document.getElementById("tabel_transaksi");
    var rowCount = table.rows.length;
    var totalHarga = 0;
    for (var i = 1; i < rowCount; i++) {
        var harga = parseInt(table.rows[i].cells[4].innerHTML);
        totalHarga += harga;
    }
    txtTotal.innerHTML = totalHarga;
    
    function tampil(event) {
      if (event.key) {
        var nama = document.getElementById("nama").value;
        var data_barang = <?php echo $databarang; ?>;
        // event.preventDefault();
        var table = document.getElementById("tabel_barang").getElementsByTagName('tbody')[0];
        while (table.firstChild) {
            table.removeChild(table.firstChild);
        }

        if(nama.length >= 1){
          var hasilPencarian = data_barang.filter(produk => produk.nama.toLowerCase().includes(nama));

          for (var i = 0; i < hasilPencarian.length; i++) {
            var newRow = table.insertRow(table.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            cell1.innerHTML = hasilPencarian[i].nama;
            cell2.innerHTML = hasilPencarian[i].harga;
        }
        if(nama.length <1){
          while (table.firstChild) {
            table.removeChild(table.firstChild);
        }
        }
        if(event.key == 'Enter'){
          document.getElementById("jumlah").focus();
        }
        }

      }
    }
  </script>
@endsection