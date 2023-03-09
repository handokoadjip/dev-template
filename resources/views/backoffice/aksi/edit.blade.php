@extends('layouts.dashboard')

@section('title', 'Ubah Aksi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Menu</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('menu_item_label', 'Menu', ['class' => 'form-label']) }}
                                {{ Form::text('menu_item_label', $data['menu_item']->menu_item_label, ['placeholder' => 'Menu', 'class' => $errors->has('menu_item_label') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'menu_item_label', 'disabled'=>'disabled']) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('menu_item_tautan', 'Tautan', ['class' => 'form-label']) }}
                                {{ Form::text('menu_item_tautan', $data['menu_item']->menu_item_tautan, ['placeholder' => 'Tautan', 'class' => $errors->has('menu_item_tautan') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'menu_item_tautan', 'disabled'=>'disabled']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        @yield('title')
                        {{ Form::open(['route' => ['aksi.destroy', $data['aksi']->aksi_id, $data['grup']->grup_id], 'method' => 'delete', 'id' => 'delete']) }}
                        {{ Form::submit('Hapus', ['class' => 'btn btn-danger delete']) }}
                        {{ Form::close() }}

                    </h3>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => ['aksi.update', $data['aksi']->aksi_id], 'method' => 'put']) }}
                    {{ Form::hidden('aksi_menu_item_id', $data['menu_item']->menu_item_id) }}
                    {{ Form::hidden('grup_id', $data['grup']->grup_id) }}
                    {{ Form::hidden('aksi_id', $data['aksi']->aksi_id) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('aksi_label', 'Label', ['class' => 'form-label']) }}
                                {{ Form::text('aksi_label', old('aksi_label', $data['aksi']->aksi_label), ['placeholder' => 'Label', 'class' => $errors->has('aksi_label') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'aksi_label', 'autofocus'=>'autofocus']) }}
                                @error('aksi_label')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('aksi_tautan', 'Tautan', ['class' => 'form-label']) }}
                                {{ Form::text('aksi_tautan', old('aksi_tautan', $data['aksi']->aksi_tautan), ['placeholder' => 'Tautan', 'class' => $errors->has('aksi_tautan') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'aksi_tautan']) }}
                                @error('aksi_tautan')
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

@push('script')
<script>
    $("#aksi_label").keyup(function() {
        let menuLabel = $("#aksi_label").val();

        let slug = menuLabel.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');

        $("#aksi_tautan").val(`/backoffice/{{ strtolower($data['menu_item']->menu_item_label) }}/${slug}`)
    })
</script>
@endpush