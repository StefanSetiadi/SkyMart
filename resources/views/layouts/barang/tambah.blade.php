@extends('main')

@section('container')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Barang</h4>
        @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{$message}}
            </div>
        @endif
        <form class="forms-sample" action="/tambahdatabarang" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="text" hidden name="id_user" value="{{Auth::user()->id_user}}">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required autofocus>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" placeholder="harga" required>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Kirim</button>
          <a class="btn btn-light" href="{{'barang'}}">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection