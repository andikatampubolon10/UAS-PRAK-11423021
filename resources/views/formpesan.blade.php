@include('sidebarplayer')

<div class="content-wrapper">
<section class="content">
<form name="pesanForm" method="post" action="{{ route('formpesan.store') }}">

    @csrf
    <div class="card-body">
        <div class="form-group">
            <input name="id_produkolahraga" type="hidden" class="form-control" id="jumlah" value="{{$kategori->id_produkolahraga}}">
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah Pesanan</label>
            <input name="jumlah" type="number" class="form-control" id="jumlah" required>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</section>
</div>

