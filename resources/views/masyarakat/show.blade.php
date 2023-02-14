@extends('layout.app')
@section('content')
<body style="background: lightwhite">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Nik</th>
                                <th>Laporan</th>
                                <th>Foto</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $pengaduan->nik }}</td>
                                    <td>{{ $pengaduan->isi_laporan }}</td>
                                    <td><img src="{{ Storage::url('public/images/').$pengaduan->foto }}" class="rounded" style="width: 150px"></td>
                                    <td>{{ $pengaduan->tgl_pengaduan }}</td>
                                </tr>
                            </tbody>
                          </table>  
                          <a class="btn btn-danger" href="{{ route('masyarakat.dashboard') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection