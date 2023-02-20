@extends('layout/app')
@section('content')
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <form method="POST" action="{{ route('masyarakat.update', $pengaduan->id_pengaduan) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <div class="alert-title"><h4>Whoops!</h4></div>
                          Ada masalah ketika memasukan input ke controller.
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div> 
                    @endif

                    @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                      <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="form-group" style="padding: 10px 0">
                    <div class="from-material">
                        <label for="date" class="from-label">Tanggal Pengaduan</label>
                        <input type="date" id="tgl_pengaduan" name="tgl_pengaduan" class="form-control" value="{{ $pengaduan->tgl_pengaduan }}">
                    </div>
                    </div>
                   
                    <div class="form-group" style="padding: 10px 0">
                                    <div class="from-material">
                                    <label for="nik" class="from-label">Nik</label>
                                    <input type="text" id="nik" name="nik" class="form-control" value="{{ $pengaduan->nik }}">

                    </div>
                    </div>
                    <div class="form-group" style="padding: 10px 0">
                                    <div class="from-material">
                                    <label for="location" class="from-label">Laporan</label>
                                    <input type="text" id="isi_laporan" name="isi_laporan" class="form-control" value="{{ $pengaduan->isi_laporan }}">

                    </div>
                    <div class="form-group" style="padding: 10px 0">
                                    <div class="from-material">
                                    <label for="foto" class="from-label">Foto</label>
                                    <input type="file" id="foto" name="foto" class="form-control">

                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <hr>
                                    <button type="submit" id="btn-send" class="btn btn-success" style="border-radius: 0.Srem">Update</button>
                                    <a class="btn btn-danger" href="{{ route('masyarakat.dashboard') }}">Back</a>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
