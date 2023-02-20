@extends('layout/menu')
@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Desa Mekar Sari</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div>
                <a href="{{ route('cetak') }}" class="btn btn-info">Cetak</a>
              </div>
              <br>
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
                    <td>Selesai diproses</td>
                    <?php endif ; ?>
                    <td>
                    <a href="{{ route('petugas.edit', $data->id_pengaduan) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-primary" href="{{ route('petugas.show', $data->id_pengaduan) }}">Detail</a>
                    <br></br>
                    <form action="{{ route('petugas.delete', $data->id_pengaduan) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit"   onclick="alert('Data Telah dihapus! ')"class="btn btn-danger plus mr-auto"><i class="fa fa-trash"></i></button>
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
@endsection