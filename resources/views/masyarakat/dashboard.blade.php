@extends('layout/app')
@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route('masyarakat.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> Tulis Laporan</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Tanggal Pengaduan</th>
                    <th>Nik</th>
                    <th>Status</th>
                    <th>More</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($pengaduan as $data )
                  <tr>
                    <td><?= $data->tgl_pengaduan ?></td>
                    <td><?= $data->nik ?></td>
                    <?php if ($data->status == 0) : ?>
                    <td>Belum diproses</td>
                    <?php elseif ($data->status == 'proses') : ?>
                    <td>Sedang diproses</td>
                    <?php elseif ($data->status == 'selesai') : ?>
                    <td>Selsai diproses</td>
                    <?php endif ; ?>
                    <td>
                    <form action="{{ route('masyarakat.delete', $data->id_pengaduan) }}" method="post">
                            @method('delete')
                            @csrf
                            <a class="btn btn-primary" href="{{ route('masyarakat.show', $data->id_pengaduan) }}">Detail</a>
                            <button type="submit"   onclick="alert('Laporan berhasil ditarik!')"class="btn btn-danger plus mr-auto">Unsend</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Tanggal Pengaduan</th>
                    <th>Nik</th>
                    <th>Status</th>
                    <th>More</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
