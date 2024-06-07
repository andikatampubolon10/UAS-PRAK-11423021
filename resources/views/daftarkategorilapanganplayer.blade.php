@include('sidebarplayer')

<style>
  .content-wrapper {
    background-image: url('{{ asset('templates/bg.avif') }}');
    background-size: cover;
    background-position: center;
    position: relative;
  }

  .content-wrapper::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(156, 140, 140, 0.8); /* Semi-transparent overlay */
    z-index: 1;
  }

  .content-wrapper .content,
  .content-wrapper .content-header {
    position: relative;
    z-index: 2;
  }
</style>

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
        <div class="row">
          @foreach($kategori as $kategories)
            <div class="card ml-4 mt-3" style="width: 280px;">
              <img src="{{ asset('folderimages/' . $kategories->file_katlapangan) }}" alt="Gambar Lapangan" style="width: 280px;">
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
