@extends('main')

@section('container')
<div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Karyawan</h4>
                  @if($message = Session::get('success'))
                    <div class="alert alert-success mt-2" role="alert">
                      {{$message}}
                    </div>
                  @endif
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <th scope="col">No.</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Waktu Pembuatan</th>
                        <th scope="col">Aksi</th>
                      </thead>
                      </tbody>
                      @php
                      $no = 1;   
                     @endphp
                     @foreach($data as $index => $row)
                     <tr>
                         <th scope="row">{{$index + $data->firstItem()}}</th>
                         <td>
                          <img src="/images/faces/{{$row->profil}}" alt="">
                         </td>
                         <td>{{$row->username}}</td>
                         <td>{{$row->nohp}}</td>
                         <td>{{$row->alamat}}</td>
                         <td>{{$row->created_at}}</td>
                         <td class="text-center">
                             <a href="#" class="btn btn-danger delete" data-id={{$row->id_user}} data-nama={{$row->username}}>Delete</a>
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
              var id_karyawan = $(this).attr("data-id");
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
                    window.location = "/hapuskaryawan"+id_karyawan+""
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