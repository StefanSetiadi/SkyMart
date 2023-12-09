@extends('main')

@section('container')

@if($message = Session::get('success'))
<div class="alert alert-success mt-2" role="alert">
  {{$message}}
</div>
@endif
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Profile</h4>
<form class="pt-3" action="/editdatauser{{Auth::user()->id_user}}"" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control form-control-lg" name="username" id="username" value="{{Auth::user()->username}}" required>
    </div>
    <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control form-control-lg" name="email" id="email" value="{{Auth::user()->email}}" required>
    </div>   
    <div class="form-group">
        <label for="profil" class="form-label">Foto</label><br>
        <div class="col-md-2">
            <img id="preview" src="images/faces/{{Auth::user()->profil}}" class="rounded mx-auto d-block" width="200" alt="profile">
        </div>
        <br>
        <input id="imageInput" type="file" name="foto" class="profil" onchange="previewImage()" accept="image/*">
    </div>              
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Role</label>
        @if (Auth::user()->role == 'karyawan')
            <div class="col-sm-4">
            <div class="form-check">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="role" value="karyawan" checked="" onclick="toggleVisibility('karyawan')">
                Karyawan
                <i class="input-helper"></i></label>
            </div>
            </div>
            <div class="col-sm-5">
            <div class="form-check">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="role" value="admin" onclick="toggleVisibility('admin')">
                Admin
                <i class="input-helper"></i></label>
            </div>
            </div>
        @else
            <div class="col-sm-4">
            <div class="form-check">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="role" value="karyawan" onclick="toggleVisibility('karyawan')">
                Karyawan
                <i class="input-helper"></i></label>
            </div>
            </div>
            <div class="col-sm-5">
            <div class="form-check">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="role" value="admin" checked="" onclick="toggleVisibility('admin')">
                Admin
                <i class="input-helper"></i></label>
            </div>
            </div>
        @endif
    </div>
        <div class="d-none" id="formkaryawan">
          <div class="form-group">
            <label for="nohp">No HP</label>
            <input type="number" class="form-control form-control-lg" name="nohp" id="nohp" placeholder="No HP" value="{{Auth::user()->nohp}}">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control form-control-lg" name="alamat" id="alamat" placeholder="Alamat">{{Auth::user()->alamat}}</textarea>
          </div>  
        </div>
    </div>
    <div class="mt-3">
    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIMPAN</button>
    </div>
</form>
      </div>
    </div>
<script>
    function previewImage() {
      var preview = document.getElementById('preview');
      var fileInput = document.getElementById('imageInput');
      var file = fileInput.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
      };

      if (file) {
        reader.readAsDataURL(file);
      }
    }
  </script>
  <script>
    window.onload = function() {
        var karyawanRadio = document.querySelector('input[name="role"][value="karyawan"]');
        if (karyawanRadio.checked) {
            toggleVisibility('karyawan');
        }
    };
    function toggleVisibility(role) {
        var formkaryawan = document.getElementById('formkaryawan');
        if (role === 'karyawan') {
            formkaryawan.classList.remove('d-none');
            document.getElementById('nohp').required = true;
            document.getElementById('alamat').required = true;
        } else if (role === 'admin') {
            formkaryawan.classList.add('d-none');
            document.getElementById('nohp').required = false;
            document.getElementById('alamat').required = false;
        }
    }
  </script>
@endsection