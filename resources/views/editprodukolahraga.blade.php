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
                <h3 class="card-title">Edit Produk Olahraga</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="tambahprodukolahraga" method="post" action="{{route('editprodukolahraga.update',$produk->id_produkolahraga)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Produk</label>
                    <input name="namaproduk" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Produk" value="{{$produk->nama_produkolahraga}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga Produk</label>
                    <input name="hargaproduk" type="text" class="form-control" id="exampleInputPassword1" placeholder="Harga Produk" value="{{$produk->harga_produkolahraga}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Stok Produk</label>
                    <input name="stokproduk" type="text" class="form-control" id="exampleInputPassword1" placeholder="Stok Produk" value="{{$produk->stok_produkolahraga}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar Produk</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="file_olahraga" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
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