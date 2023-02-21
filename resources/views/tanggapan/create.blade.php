@extends('layout/menu')
@section('content')
<div class="py-12">
    <div class="p-6 text-gray-900">
        <form method="POST" action="{{ route('tanggapan.store')}}">
                @csrf
                <div class="form-group" style="padding: 10px 0">
                    <div class="from-material">
                        <label for="date" class="from-label">Tanggal Tanggapan</label>
                    <input type="date" id="tgl_tanggapan" name="tgl_tanggapan" class="form-control">
                </div>
            </div>
    <div class="form-group" style="padding: 10px 0">
                <div class="from-material">
                    <label for="location" class="from-label">Tanggapan</label>
                    <textarea class="form-control" name="tanggapan" id="tanggapan"></textarea>
            </div>
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" id="btn-send" class="btn btn-primary" style="border-radius: 0.Srem">Simpan</button>
                    <a class="btn btn-danger" href="{{ route('tanggapan.dashboard') }}">Back</a>
                    </div>
                </form>  
                </div>
            </div>
        </div>
<!-- <div class="mt-4">
    <textarea class="form-control"></textarea>
</diV> -->
@endsection