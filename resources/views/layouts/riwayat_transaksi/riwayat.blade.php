@extends('main')

@section('container')
<div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Riwayat Transaksi  </h4>
                  @if($message = Session::get('success'))
                    <div class="alert alert-success mt-2" role="alert">
                      {{$message}}
                    </div>
                  @endif
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Karyawan</th>
                        <th scope="col">Aksi</th>
                      </thead>
                      </tbody>
                      @php
                      $previousNo = null;
                      $rowspanCount = 1;
                      @endphp
          
                      @foreach ($data as $index => $row)
                      <tr>
                          @if ($previousNo === null || $previousNo !== $row->no_riwayat)
                              <!-- Baris baru karena nomor berbeda atau pertama kali -->
                              @if ($previousNo !== null)
                                  </tr>
                              @endif

                              @php
                              $rowspan = 1;
                                foreach ($data as $bantu) {
                                    if ($bantu["no_riwayat"] == $row->no_riwayat) {
                                        $rowspan++;
                                    }
                                }
                              @endphp
                              <tr>
                                  <td rowspan="{{$rowspan}}">{{ $row->no_riwayat }}</td>
                                  <td>{{$row->nama_barang}}</td>
                                  <td>{{$row->jumlah}} </td>
                                  <td>{{$row->subtotal}}</td>
                                  <td rowspan="{{$rowspan}}">{{ $row->totalharga }}</td>
                                  <td rowspan="{{$rowspan}}">{{$row->created_at}}</td>
                                  <td rowspan="{{$rowspan}}">{{$row->nama_karyawan}}</td>
                                  <td rowspan="{{$rowspan}}">
                                      <a href="/hapusriwayat{{$row->no_riwayat}}" class="btn btn-danger">Delete</a>
                                  </td>
                              @else
                                  <td>{{$row->nama_barang}}</td>
                                  <td>{{$row->jumlah}} </td>
                                  <td>{{$row->subtotal}}</td>
                              @endif
                              @php
                                  $previousNo = $row->no_riwayat;
                              @endphp
              
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection