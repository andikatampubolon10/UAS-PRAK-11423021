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
                <h3 class="card-title">Edit Member</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="editmember" method="post" action="{{ route('editmember.update', $member->id) }}">
              @csrf
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Member</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Nama" value="{{ $member->name }}">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control" id="username" placeholder="Username" value="{{ $member->username }}">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="text" class="form-control" id="password" placeholder="Password" value="{{ $member->password }}">
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label><br>
                    <input name="role" type="radio" id="admin" value="admin" {{ $member->role == 'admin' ? 'checked' : '' }}>
                    <label for="admin">Admin</label>
                    <input name="role" type="radio" id="player" value="player" {{ $member->role == 'player' ? 'checked' : '' }}>
                    <label for="player">Player</label>
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
