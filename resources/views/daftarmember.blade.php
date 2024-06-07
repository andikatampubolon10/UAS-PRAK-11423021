@include('sidebarpengelola')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <a type="button" href="tambahmember" class="btn btn-block btn-primary col-1 ml-3 mb-2">Tambah</a>
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
                    <th>Nama Member</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                 
                  </thead>
                  <tbody>
                    @php 
					          $no=1;
				            @endphp
                    @foreach($member as $members)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$members->name}}</td>
                    <td>{{$members->username}}</td>
                    <td>{{$members->role}}</td>
                    <td><a type="button" href="/editmember/edit/{{$members->id}}" class="btn  btn-dark mb-2">Edit</a>
                      <a type="button" href="daftarmember/delete/{{$members->id}}" class="btn btn-danger ml-2 mb-2" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">Hapus</a></td>
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