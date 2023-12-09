<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SkyMart</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo.svg" alt="logo">
              </div>
              @if(session('message'))
              <div class="alert alert-success">
                  {{session('message')}}
              </div>
              @endif
              <form action="{{ route('actionregister') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="profil" class="form-label">Masukkan Foto</label>
                  <div class="col-md-2">
                    <img id="preview" style="visibility:hidden;" class="rounded mx-auto d-block" width="200" alt="profile">
                  </div><br>
                  <input id="imageInput" type="file" name="foto" class="profil" onchange="previewImage()" accept="image/*">
                </div>              
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="role" value="admin" onclick="toggleVisibility('admin')" checked="" >
                          Admin
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="role" value="karyawan" onclick="toggleVisibility('karyawan')">
                          Karyawan
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                </div>
                <div class="d-none" id="formkaryawan">
                  <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="number" class="form-control form-control-lg" name="nohp" id="nohp" placeholder="No HP" value="">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control form-control-lg" name="alamat" id="alamat" placeholder="Alamat" value=""></textarea>
                  </div>  
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" required>
                      Saya setuju dengan syarat & ketentuan
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">DAFTAR</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Masuk</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
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
      preview.style.visibility = "visible";
    }
  </script>

<script>
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
</body>

</html>
