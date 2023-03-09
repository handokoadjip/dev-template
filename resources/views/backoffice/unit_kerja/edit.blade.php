@extends('layouts.dashboard')

@section('title', 'Ubah Grup')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => ['unit-kerja.update', $data['unit_kerja']->unit_kerja_id], 'method' => 'put']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('unit_kerja_nama', 'Grup', ['class' => 'form-label']) }}
                                {{ Form::text('unit_kerja_nama', old('unit_kerja_nama', $data['unit_kerja']->unit_kerja_nama), ['placeholder' => 'Grup', 'class' => $errors->has('unit_kerja_nama') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'unit_kerja_nama', 'autofocus'=>'autofocus']) }}
                                @error('unit_kerja_nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('unit_kerja_deskripsi', 'Deskripsi', ['class' => 'form-label']) }}
                                {{ Form::text('unit_kerja_deskripsi', old('unit_kerja_deskripsi', $data['unit_kerja']->unit_kerja_deskripsi), ['placeholder' => 'Deskripsi', 'class' => $errors->has('unit_kerja_deskripsi') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'unit_kerja_deskripsi']) }}
                                @error('unit_kerja_deskripsi')
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