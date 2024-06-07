@include('sidebar')
<div class="content-wrapper">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Member</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="tambahpengelola" method="post" action="{{route('tambahpengelola.store')}}">
              @csrf
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input name="name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input name="username" type="text" class="form-control" id="exampleInputPassword1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="pengelolaSelect">Lokasi</label>
                    <select class="form-control" id="pengelolaSelect" name="id_lokasi">
                      @foreach($lokasi as $lokasis)
                      <option value={{ $lokasis->id_lokasi }}>{{$lokasis->nama_lokasi}}</option>
                      @endforeach
                    </select>
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