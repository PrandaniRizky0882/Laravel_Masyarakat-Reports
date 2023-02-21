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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Tanggal Pengaduan</th>
                    <th>Nik</th>
                    <th>Laporan</th>
                    <th>Status</th>
                    <th>More</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($pengaduan as $data )
                  <tr>
                    <td><?= $data->tgl_pengaduan ?></td>
                    <td><?= $data->nik ?></td>
                    <td><?= $data->isi_laporan ?></td>
                    <?php if ($data->status == 0) : ?>
                    <td>Belum diproses</td>
                    <?php elseif ($data->status == 'proses') : ?>
                    <td>Sedang diproses</td>
                    <?php elseif ($data->status == 'selesai') : ?>
                    <td>Selesai diproses</td>
                    <?php endif ; ?>
                    <td>
                    <a href="{{  route('tanggapan.create',$data->id_pengaduan) }}" class="btn btn-danger">Tanggapan</a>
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
