@include('sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengelola Lapangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Pengelola Lapangan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <a type="button" href="tambahpengelola" class="btn btn-block btn-primary col-1 ml-3 mb-2">Tambah</a>
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
                    <th>Nama Member</th>
                    <th>Username</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                  </tr>
                 
                  </thead>
                  <tbody>
                    @php 
                    $no=1;
                  @endphp  
                  @foreach($pengelola as $pengelolas)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$pengelolas->name}}</td>
                    <td>{{$pengelolas->username}}</td>
                    <td>{{$pengelolas->nama_lokasi}}</td>
                    <td><a type="button" href="/editpengelola/edit/{{$pengelolas->id}}" class="btn  btn-dark mb-2">Edit</a>
                    <a type="button" href="daftarpengelolalapangan/delete/{{$pengelolas->id}}" class="btn btn-danger ml-2 mb-2" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">Hapus</a></td>
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