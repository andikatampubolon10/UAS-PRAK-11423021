@include('sidebarplayer')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Bookingan Lapangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Bookingan Lapangan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    
                  <tr>
                    <th>No</th>
                    <th>Nama Lapangan</th>
                    <th>Harga Lapangan</th>
                    <th>Tanggal Booking</th>
                    <th>Waktu Mulai Booking</th>
                    <th>Waktu Selesai Booking</th>
                    <th>Gambar Lapangan</th>
                    <th>Status</th>
                  </tr>
                 
                  </thead>
                  <tbody>
                    @php 
					          $no=1;
				            @endphp
                    @foreach($data as $datas)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$datas->nama_katlapangan}}</td>
                    <td>Rp.{{$datas->harga_katlapangan}}</td>
                    <td>{{$datas->tanggal_booking}}</td>
                    <td>{{$datas->waktu_mulai_booking}}</td>
                    <td>{{$datas->waktu_selesai_booking}}</td>
                    <td><img width ="270rem" src="{{ asset('folderimages/' . $datas->file_katlapangan) }}" alt="Gambar Lapangan"></td>
                    <td>{{$datas->status}}</td>
                  </tr>
                  @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>