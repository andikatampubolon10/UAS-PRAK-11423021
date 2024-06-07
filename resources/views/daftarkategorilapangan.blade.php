@include('sidebarpengelola')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4><strong>Lokasi Pengelola:</strong> {{ $lokasi->nama_lokasi }}</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategori Lapangan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <a type="button" href="tambahkategorilapangan" class="btn btn-block btn-primary col-1 ml-3 mb-2">Tambah</a>
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
                    <th>Gambar Lapangan</th>
                    <th>Waktu Buka</th>
                    <th>Waktu Tutup</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php 
                    $no=1;
                  @endphp
                  @foreach($kategori as $kategories)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$kategories->nama_katlapangan}}</td>
                    <td><img width ="270rem" src="{{ asset('folderimages/' . $kategories->file_katlapangan) }}" alt="Gambar Lapangan"></td>
                    <td>{{$kategories->waktu_buka}}</td>
                    <td>{{$kategories->waktu_tutup}}</td> 
                    <td>
                      <a type="button" href="/editkategorilapangan/edit/{{$kategories->id_katlapangan}}" class="btn btn-dark mb-2">Edit</a>
                      <a type="button" href="daftarkategorilapangan/delete/{{$kategories->id_katlapangan}}" class="btn btn-danger ml-2 mb-2" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">Hapus</a>
                    </td>
                    
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
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
