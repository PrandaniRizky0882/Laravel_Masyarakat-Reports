@extends('layout.app')
@section('content')
<div class="py-12">
    <div class="p-6 text-gray-900">
        <form method="POST" action="{{ route('masyarakat.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="padding: 10px 0">
                    <div class="from-material">
                        <label for="date" class="from-label">Tanggal Pengaduan</label>
                    <input type="date" id="tgl_pengaduan" name="tgl_pengaduan" class="form-control">
                </div>
            </div>
    <div class="form-group" style="padding: 10px 0">
                <div class="from-material">
                    <label for="nik" class="from-label">Nik</label>
                <input type="text" id="nik" name="nik" class="form-control" placeholder="Nik yang Didaftarkan">
            </div>
        </div>
    <div class="form-group" style="padding: 10px 0">
                <div class="from-material">
                    <label for="location" class="from-label">Laporan</label>
                <input type="text" id="isi_laporan" name="isi_laporan" class="form-control">
            </div>
    <div class="form-group" style="padding: 10px 0">
                <div class="from-material">
                    <label for="foto" class="from-label">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control">
            </div>
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" id="btn-send" class="btn btn-primary" style="border-radius: 0.Srem">Simpan</button>
                    <a class="btn btn-danger" href="{{ route('masyarakat.dashboard') }}">Back</a>
                    </div>
                </form>  
                </div>
            </div>
        </div>
    </div>
@endsection