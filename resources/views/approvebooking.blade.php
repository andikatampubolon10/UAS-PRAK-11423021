@include('sidebarpengelola')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Approve Booking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Approve Booking</li>
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
                    <th>Nama Lapangan</th>
                    <th>Harga Lapangan (per Jam)</th>
                    <th>Gambar Lapangan</th>
                    <th>Waktu Mulai Booking</th>
                    <th>Waktu Selesai Booking</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $datas)
                  <tr>
                    <td>{{$datas->username}}</td>
                    <td>{{$datas->nama_katlapangan}}</td>
                    <td>Rp. 55,000</td>
                    <td><img width="270rem" src="{{ asset('folderimages/' . $datas->file_katlapangan) }}" alt="Gambar Lapangan"></td>
                    <td>{{$datas->waktu_mulai_booking}}</td>
                    <td>{{$datas->waktu_selesai_booking}}</td>
                    <td>
                      @php
                        $startTime = new DateTime($datas->waktu_mulai_booking);
                        $endTime = new DateTime($datas->waktu_selesai_booking);
                        $interval = $endTime->diff($startTime);
                        $hours = $interval->h + ($interval->days * 24);
                        $minutes = $interval->i;
                        $totalHours = $minutes > 0 ? $hours + 1 : $hours;
                        $totalPrice = $totalHours * 55000;
                      @endphp
                      Rp. {{ number_format($totalPrice, 0, ',', '.') }}
                    </td>
                    <td>
                    <form name="bookingForm" method="post" action="{{ route('approvebooking.update', $datas->id_booking_olahraga)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                          <div class="form-group">
                            <input name="id_katlapangan" type="hidden" class="form-control" id="id" value="{{$datas->id_booking_olahraga}}">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="approve">Approve</button>
                        <button type="submit" class="btn btn-danger" name="reject">Reject</button>
                      </div>
                    </td>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const bookingForms = document.querySelectorAll('form[name="bookingForm"]');
    const hourlyRate = 55000;

    bookingForms.forEach(form => {
        const startTimeInput = form.querySelector('input[name="waktu_mulai_booking"]');
        const endTimeInput = form.querySelector('input[name="waktu_selesai_booking"]');
        const totalPriceElement = form.querySelector('.total-price');

        function calculateTotalPrice() {
            const startTime = startTimeInput.value;
            const endTime = endTimeInput.value;

            if (startTime && endTime) {
                const start = new Date(`1970-01-01T${startTime}:00`);
                const end = new Date(`1970-01-01T${endTime}:00`);
                let diff = (end - start) / (1000 * 60 * 60); // difference in hours

                if (diff > 0) {
                    diff = Math.ceil(diff); // round up to the next hour
                    const totalPrice = diff * hourlyRate;
                    totalPriceElement.textContent = `Rp. ${totalPrice.toLocaleString('id-ID')}`;
                } else {
                    totalPriceElement.textContent = 'Rp. 0';
                }
            }
        }

        startTimeInput.addEventListener('change', calculateTotalPrice);
        endTimeInput.addEventListener('change', calculateTotalPrice);
    });
});
</script>
