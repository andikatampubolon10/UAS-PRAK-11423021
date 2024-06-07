@include('sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lihat Pesanan Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lihat Pesanan Produk</li>
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
                    <th>Nama Pemesan</th>
                    <th>ID Produk</th>
                    <th>Nama Produk</th>
                    <th>Gambar Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Waktu Pemesanan</th>
                  </tr>
                  
                  </thead>
                  <tbody>@foreach($data as $datas)
                  <tr>
                    <td>{{$datas->name}}</td>
                    <td>{{$datas->id_produkolahraga}}</td>
                    <td>{{$datas->nama_produkolahraga}}</td>
                    <td><img width ="270rem" src="{{ asset('folderimages/' . $datas->file_olahraga) }}" alt="Gambar Lapangan"></td>
                    <td>{{$datas->jumlah}}</td>
                    <td>Rp.{{$datas->harga_produkolahraga}}</td>
                    <td>Rp.{{$datas->total}}</td>
                    <td>{{$datas->created_at}}</td>
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