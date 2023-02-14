@extends('layout/app')
@section('content')
<!-- @auth
<p>Peduli Diri, Hai- <b>{{ Auth::user()->name }}</b></p>
@endauth -->
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-end mt-4">
            <a href="{{ route('masyarakat.create') }}" class="btn btn-success">
                        <i class="fa fa-pencil mr-5"></i> Tulis Laporan</a>
        </div>
        
        <hr>
        <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-900">
                  @foreach ($pengaduan as $data )
                    <div class="flex justify-between">
                        <div class="flex justify-start">
                                <p>Tanggal Pengaduan : <?= $data->tgl_pengaduan ?></p>
                                <p>Nik: <?= $data->nik ?></p>
                                <?php if ($data->status == 0) : ?>
                                <p>Belum diproses</p>
                                <?php elseif ($data->status == 'proses') : ?>
                                <p>Sedang diproses</p>
                                <?php elseif ($data->status == 'selesai') : ?>
                                <p>Selsai diproses</p>
                                <?php endif ; ?>
                        </div> 

                        <div class="flex items-center justify-end mt-4">
                        
                        <a class="btn btn-primary" href="{{ route('masyarakat.show', $data->id_pengaduan) }}">Detail</a>
                        <a href="masyarakat/{{ $data->id_pengaduan }}/edit" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                        <br></br>
                        <form action="/masyarakat/{{$data->id_pengaduan}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit"   onclick="alert('Data Telah dihapus! ')"class="btn btn-danger plus mr-auto"><i class="fa fa-trash"></i></button>
                        </form>
                        </div>
                        <hr>
                        </div>
                    </div>
                  @endforeach  
                </div>
            </div>
        </div>
    </div>
@endsection
