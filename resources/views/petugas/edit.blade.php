@extends('layout/menu')
@section('content')
<div class="py-12">
    <form method="POST" action="{{ route('petugas.update', $pengaduan->id_pengaduan) }}" enctype="multipart/form-data">
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
                    <div class="form-group" style="padding: 10px 0">
                         <div class="from-material">
                            <label for="foto" class="from-label">Status</label>
                            <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                          <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                          <select class="custom-select mr-sm-2" id="status" name="status">
                            <?php if ($pengaduan->status == "0") { ?>
                            <option selected value="0">Belum Ditanggapi</option>
                            <option value="proses">Masih Kami Proses</option>
                            <option value="selesai">Selesai kami proses</option>
                            <?php }else if ($pengaduan->status == "proses") { ?>
                            <option value="0">Belum Ditanggapi</option>
                            <option selected value="proses">Masih Kami Proses</option>
                            <option value="selesai">Selesai kami proses</option>  
                            <?php }else { ?>
                            <option value="0">Belum Ditanggapi</option>
                            <option value="proses">Masih Kami Proses</option>
                            <option selected value="selesai">Selesai kami proses</option>  
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" id="btn-send" class="btn btn-success" style="border-radius: 0.Srem">Update</button>
                             <a class="btn btn-danger" href="{{ route('petugas.tampil') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection