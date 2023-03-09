@extends('layouts.dashboard')

@section('title', 'Ganti Password')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'change-password.update', 'method' => 'put']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_password_lama', 'Password Lama', ['class' => 'form-label']) }}
                                {{ Form::password('pengguna_password_lama', ['placeholder' => 'Password Lama', 'class' => $errors->has('pengguna_password_lama') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'pengguna_password_lama', 'autofocus'=>'autofocus']) }}
                                @error('pengguna_password_lama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_password_baru', 'Password Baru', ['class' => 'form-label']) }}
                                {{ Form::password('pengguna_password_baru', ['placeholder' => 'Password Baru', 'class' => $errors->has('pengguna_password_baru') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'pengguna_password_baru', 'autofocus'=>'autofocus']) }}
                                @error('pengguna_password_baru')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_password_baru_confirmation', 'Konfirmasi Password', ['class' => 'form-label']) }}
                                {{ Form::password('pengguna_password_baru_confirmation', ['placeholder' => 'Konfirmasi Password', 'class' => $errors->has('pengguna_password_baru_confirmation') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'pengguna_password_baru_confirmation', 'autofocus'=>'autofocus']) }}
                                @error('pengguna_password_baru_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{ Form::submit('Simpan', ['class' => 'btn btn-success waitme']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection