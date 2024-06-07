@include('sidebarplayer')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4><strong>Lokasi Member:</strong> {{ $lokasi->nama_lokasi }}</h4>
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row ">
        @foreach($kategori as $kategories)
    <div width="280rem" class="card ml-4 mt-3">
      <img width="280rem"src="{{ asset('folderimages/' . $kategories->file_katlapangan) }}" alt="Gambar Lapangan">
            <div class="card-body">
                <h5 class="card-text">{{$kategories->nama_katlapangan}}</h5>
                <h5 class="card-text">Harga/jam: Rp.{{$kategories->harga_katlapangan}}</h5>
                <h5 class="card-text">Waktu Buka: {{$kategories->waktu_buka}}</h5>
                <h5 class="card-text">Waktu Tutup: {{$kategories->waktu_tutup}}</h5>
                <a href="{{ route('formbooking.form', ['id' => $kategories->id_katlapangan]) }}" class="btn btn-primary">Booking</a>
            </div>
    </div>
@endforeach


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