@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <a href="{{ url('/daftarkategorilapanganplayer' )}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Masuk dengan klik disini</p>
                </a>
              </li>
            </div>
        </div>
    </div>
</div>
@endsection
