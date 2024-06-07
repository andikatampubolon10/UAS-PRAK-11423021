@include('sidebarplayer')

<div class="content-wrapper">
    <section class="content">
        <form name="bookingForm" method="post" action="{{ route('formbooking.store') }}">

            @csrf
            <div class="card-body">
                <div class="form-group">
                    <input name="id_katlapangan" type="hidden" class="form-control" id="id_katlapangan" value="{{$kategori->id_katlapangan}}">
                </div>
                <div class="form-group">
                    <label for="tanggal_booking">Tanggal Booking</label>
                    <input name="tanggal_booking" type="date" class="form-control" id="tanggal_booking" required>
                </div>
                <div class="form-group">
                    <label for="waktumulai">Waktu Mulai Booking</label>
                    <input name="waktumulai" type="time" class="form-control" id="waktumulai" required>
                </div>
                <div class="form-group">
                    <label for="waktuselesai">Waktu Selesai Booking</label>
                    <input name="waktuselesai" type="time" class="form-control" id="waktuselesai" required>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tanggal_booking = document.getElementById('tanggal_booking');
    const waktumulai = document.getElementById('waktumulai');
    const waktuselesai = document.getElementById('waktuselesai');
    const bookingForm = document.forms['bookingForm'];

    function validateTime() {
        const startTime = waktumulai.value;
        const endTime = waktuselesai.value;

        if (startTime && endTime) {
            const start = new Date(`1970-01-01T${startTime}:00`);
            const end = new Date(`1970-01-01T${endTime}:00`);
            const diff = (end - start) / (1000 * 60 * 60); // difference in hours

            if (diff > 2) {
                alert('Waktu Selesai Booking harus maksimal 2 jam dari Waktu Mulai Booking');
                waktuselesai.value = '';
                waktuselesai.focus();
            } else if (diff <= 0) {
                alert('Waktu Selesai Booking tidak boleh sebelum atau sama dengan Waktu Mulai Booking');
                waktuselesai.value = '';
                waktuselesai.focus();
            }
        }
    }

    function validateDateTime() {
        const today = new Date();
        const bookingDate = new Date(tanggal_booking.value + 'T' + waktumulai.value);

        if (bookingDate < today) {
            alert('Tanggal dan waktu booking tidak boleh sebelum waktu saat ini.');
            tanggal_booking.value = '';
            waktumulai.value = '';
            waktuselesai.value = '';
            tanggal_booking.focus();
        }
    }

    waktumulai.addEventListener('change', function() {
        validateTime();
        validateDateTime();
    });

    waktuselesai.addEventListener('change', validateTime);

    tanggal_booking.addEventListener('change', validateDateTime);

    bookingForm.addEventListener('submit', function (e) {
        const startTime = waktumulai.value;
        const endTime = waktuselesai.value;
        const bookingDate = new Date(tanggal_booking.value + 'T' + startTime);

        if (startTime && endTime) {
            const start = new Date(`1970-01-01T${startTime}:00`);
            const end = new Date(`1970-01-01T${endTime}:00`);
            const diff = (end - start) / (1000 * 60 * 60); // difference in hours

            if (diff > 2) {
                e.preventDefault();
                alert('Waktu Selesai Booking harus maksimal 2 jam dari Waktu Mulai Booking');
                waktuselesai.focus();
                return;
            } else if (diff <= 0) {
                e.preventDefault();
                alert('Waktu Selesai Booking tidak boleh sebelum atau sama dengan Waktu Mulai Booking');
                waktuselesai.focus();
                return;
            }
        }

        if (bookingDate < new Date()) {
            e.preventDefault();
            alert('Tanggal dan waktu booking tidak boleh sebelum waktu saat ini.');
            tanggal_booking.focus();
        }
    });
});
</script>
