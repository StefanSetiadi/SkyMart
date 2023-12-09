@extends('main')

@section('container')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Barang</h4>
        <form action="/barang" method="GET">
        <div class="input-group">
          <button type="submit" class="btn btn-outline-secondary rounded-0">
                <i class="icon-search"></i>
            </span>
          </button>
            <input type="text" class="form-control" name="search" id="search" placeholder="Search now" aria-label="search" aria-describedby="search" autofocus>
          </div>
        </form>
          <a href={{'tambahbarang'}} class="btn btn-success mt-2">Tambah</a>
        @if($message = Session::get('success'))
          <div class="alert alert-success mt-2" role="alert">
            {{$message}}
          </div>
        @endif
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Harga</th>
              <th scope="col">Karyawan</th>
              <th scope="col">Diperbarui</th>
              <th scope="col">Aksi</th>
            </thead>
            </tbody>
            @php
            $no = 1;   
            @endphp
            @foreach($data as $index => $row)
            <tr>
                <th scope="row">{{$index + $data->firstItem()}}</th>
                <td>{{$row->nama}}</td>
                <td>{{$row->harga}}</td>
                <td>{{ucwords($user->where('id_user', $row->id_user)->first()->username)}}</td>
                <td>{{$row->updated_at}}</td>
                <td class="text-center">
                    <a href="/editbarang{{$row->id_barang}}" class="btn btn-info">Edit</a>
                    <a href="#" id="delete" class="btn btn-danger delete" data-id={{$row->id_barang}} data-nama={{$row->nama}}>Delete</a>
                </td>
              </tr>
            @php
              $no++;
            @endphp
            @endforeach
            @if($no==1)
            <tr>
              <td colspan="8" class="text-center table-danger">Data Tidak Ditemukan !!!</td>
            </tr>
            @endif
            </tbody>
          </table>
          <br>
          {{ $data->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('.delete').click(function(){
    var id_barang = $(this).attr("data-id");
    var nama = $(this).attr("data-nama");
    swal({
        title: "Yakin?",
        text: "Kamu akan menghapus barang dengan nama : "+nama+"",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/hapusbarang"+id_barang+""
        } else {
          swal("Data tidak jadi dihapus");
        }
      });
  });
  @if(Session::has('successdelete'))
    swal("Data berhasil di hapus", {
              icon: "success",
            });
  @endif
</script>
@endsection