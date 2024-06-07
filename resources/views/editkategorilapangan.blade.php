@include('sidebarpengelola')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Kategori Lapangan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form name="tambahkategorilapangan" method="post" action="{{ route('editkategorilapangan.update', $kategori->id_katlapangan) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Lapangan</label>
                                    <input name="namalapangan" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Lapangan" value="{{ $kategori->nama_katlapangan }}">
                                </div>
                                <div class="form-group">
                                    <label for="waktututup">Waktu Buka</label>
                                    <input name="waktu_buka" type="time" class="form-control" id="waktubuka" value="{{ $kategori->waktu_buka }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="waktututup">Waktu Tutup</label>
                                    <input name="waktu_tutup" type="time" class="form-control" id="waktututup" value="{{ $kategori->waktu_tutup }}">
                                  </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Gambar Lapangan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="file_katlapangan" type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    @if ($kategori->file_katlapangan)
                                        <img src="{{ asset('folderimages/' . $kategori->file_katlapangan) }}" alt="Gambar Lapangan" width="200" height="150">
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    <!-- general form elements -->


                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const waktubuka = document.getElementById('waktubuka');
        const waktututup = document.getElementById('waktututup');
        const bookingForm = document.forms['bookingForm'];
    
        function validateTime() {
            const startTime = waktubuka.value;
            const endTime = waktututup.value;
    
            if (startTime && endTime) {
                const start = new Date(`1970-01-01T${startTime}:00`);
                const end = new Date(`1970-01-01T${endTime}:00`);
                const diff = (end - start) / (1000 * 60 * 60); // difference in hours
    
            if (diff <= 0) {
                    alert('Waktu Tutup tidak boleh sebelum Waktu Buka');
                    waktututup.value = '';
                    waktututup.focus();
                }
            }
        }
    
        waktubuka.addEventListener('change', function() {
            validateTime();
            validateDateTime();
        });
    
        waktututup.addEventListener('change', validateTime);
    
    
        bookingForm.addEventListener('submit', function (e) {
            const startTime = waktubuka.value;
            const endTime = waktututup.value;
    
    
            if (startTime && endTime) {
                const start = new Date(`1970-01-01T${startTime}:00`);
                const end = new Date(`1970-01-01T${endTime}:00`);
                const diff = (end - start) / (1000 * 60 * 60); // difference in hours
    
            if (diff <= 0) {
                    e.preventDefault();
                    alert('Waktu Tutup tidak boleh sebelum Waktu Buka');
                    waktututup.focus();
                    return;
                }
            }
    
            
        });
    });
    </script>
    
