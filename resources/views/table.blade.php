<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Tanggal Booking</th>
      <th>Nama Pemesan</th>
      <th>Nama Lapangan</th>
      <th>Harga Lapangan (per Jam)</th>
      <th>Waktu Mulai Booking</th>
      <th>Waktu Selesai Booking</th>
      <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $datas)
    <tr>
      <td>{{$datas->tanggal_booking}}</td>
      <td>{{$datas->username}}</td>
      <td>{{$datas->nama_katlapangan}}</td>
      <td>Rp. 55,000</td>
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
    </tr>
    @endforeach
    </tbody>
    <tfoot>
    </tfoot>
</table>