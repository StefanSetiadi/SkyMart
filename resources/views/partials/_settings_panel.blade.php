<div class="container-fluid page-body-wrapper">
<div id="right-sidebar" class="settings-panel">
  <i class="settings-close ti-close"></i>
  <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">DAFTAR TUGAS</a>
    </li>
  </ul>
  <div class="tab-content" id="setting-content">
    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
      <div class="add-items d-flex px-3 mb-0">
        <form class="form w-100" action="/tambahdatatugas" method="POST">
          @csrf
          <input type="text" hidden name="id_user" value="{{Auth::user()->id_user}}">
          <div class="form-group d-flex">
            <input type="text" name="tugas" class="form-control todo-list-input" placeholder="Tambah Tugas">
            <button type="submit" class="btn btn-primary" id="add-task">Tambah</button>
          </div>
        </form>
      </div>
      <div class="list-wrapper px-3">
        <ul class="d-flex flex-column-reverse todo-list">
          @foreach($tugas as $row)
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                {{$row->tugas}}
              </label>
            </div>
            <a class="remove ti-close" href="/hapusdatatugas{{$row->id_tugas}}""></a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>