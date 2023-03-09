@extends('layouts.dashboard')

@section('title', 'Hak Akses Grup')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('grup_nama', 'Grup', ['class' => 'form-label']) }}
                                {{ Form::text('grup_nama', $data['grup']->grup_nama, ['placeholder' => 'Grup', 'class' => $errors->has('grup_nama') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'grup_nama', 'disabled'=>'disabled']) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('grup_deskripsi', 'Deskripsi', ['class' => 'form-label']) }}
                                {{ Form::text('grup_deskripsi', $data['grup']->grup_deskripsi, ['placeholder' => 'Deskripsi', 'class' => $errors->has('grup_deskripsi') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'grup_deskripsi', 'disabled'=>'disabled']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ Form::open(['route' => ['grup.permissionSync', $data['grup']->grup_id], 'method' => 'post']) }}
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title">Menu</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        @forelse($data['grupMenuItems'] as $key => $grup_menu_item)
                        <div class="col-lg-4 mb-4">
                            <div class="accordion h-100" id="accordion-{{ $grup_menu_item->menu_item_id }}">
                                <div class="accordion-item h-100">
                                    <h2 class="accordion-header" id="heading-{{ $grup_menu_item->menu_item_id }}">
                                        <button class="accordion-button {{ @$grup_menu_item->grups[0]->pivot->grup_menu_item_menu_item_id == $grup_menu_item->menu_item_id ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $grup_menu_item->menu_item_id }}" aria-expanded="{{ @$grup_menu_item->grups[0]->pivot->grup_menu_item_menu_item_id == $grup_menu_item->menu_item_id }}" aria-controls="collapse-{{ $grup_menu_item->menu_item_id }}">
                                            <div class="form-check">
                                                {{ Form::checkbox('grup_menu_item[' . $key. ' ]', $grup_menu_item->menu_item_id, false, ['class' => 'form-check-input', 'id' => $grup_menu_item->menu_item_id, 'checked' => @$grup_menu_item->grups[0]->pivot->grup_menu_item_menu_item_id == $grup_menu_item->menu_item_id ]) }}
                                                {{ Form::label($grup_menu_item->menu_item_id, $grup_menu_item->menu_item_label, ['class' => 'form-check-label']) }}
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $grup_menu_item->menu_item_id }}" class="accordion-collapse collapse {{ @$grup_menu_item->grups[0]->pivot->grup_menu_item_menu_item_id == $grup_menu_item->menu_item_id ? 'show' : '' }}" aria-labelledby="heading-{{ $grup_menu_item->menu_item_id }}" data-bs-parent="#accordion-{{ $grup_menu_item->menu_item_id }}">
                                        <div class="accordion-body">
                                            <div class="ms-3 form-check">
                                                {{ Form::checkbox('grup_menu_crud[' . $key . '][tambah]', 'ya', false, ['class' => 'form-check-input', 'id' => 'tambah|' . $grup_menu_item->menu_item_id, 'checked' => @$grup_menu_item->grups[0]->pivot->grup_menu_item_tambah == 'ya']) }}
                                                {{ Form::label('tambah|' . $grup_menu_item->menu_item_id, 'Tambah', ['class' => 'form-check-label']) }}
                                            </div>
                                            <div class="ms-3 form-check">
                                                {{ Form::checkbox('grup_menu_crud[' . $key . '][ubah]', 'ya', false, ['class' => 'form-check-input', 'id' => 'ubah|' . $grup_menu_item->menu_item_id, 'checked' => @$grup_menu_item->grups[0]->pivot->grup_menu_item_ubah == 'ya']) }}
                                                {{ Form::label('ubah|' . $grup_menu_item->menu_item_id, 'Ubah', ['class' => 'form-check-label']) }}
                                            </div>
                                            <div class="ms-3 form-check">
                                                {{ Form::checkbox('grup_menu_crud[' . $key . '][hapus]', 'ya', false, ['class' => 'form-check-input', 'id' => 'hapus|' . $grup_menu_item->menu_item_id, 'checked' => @$grup_menu_item->grups[0]->pivot->grup_menu_item_hapus == 'ya']) }}
                                                {{ Form::label('hapus|' . $grup_menu_item->menu_item_id, 'Hapus', ['class' => 'form-check-label']) }}
                                            </div>
                                            @foreach ($grup_menu_item->aksis as $key => $aksi)
                                            <div class="ms-3 form-check">
                                                {{ Form::checkbox('grup_aksi[' . $aksi->aksi_id . ']', $aksi->aksi_id, false, ['class' => 'form-check-input', 'id' => $grup_menu_item->menu_item_id, 'checked' => @$grup_menu_item->aksis[$key]->grups[0]->pivot->grup_aksi_aksi_id == $aksi->aksi_id]) }}
                                                <a class="form-check-label text-primary" href="{{ route('aksi.edit', ['aksi' => $aksi->aksi_id, 'menu_id' => $grup_menu_item->menu_item_id, 'grup_id' => $data['grup']->grup_id]) }}">
                                                    {{$aksi->aksi_label}}
                                                </a>
                                            </div>
                                            @endforeach
                                            <div class="ms-3 mt-3">
                                                <a class="btn btn-sm btn-primary" href="{{ route('aksi.create', ['menu_id' => $grup_menu_item->menu_item_id, 'grup_id' => $data['grup']->grup_id]) }}">Tambah Aksi</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-lg-12">
                            <p>Tidak ada Menu</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title">Unit Kerja</h3>
                </div>
                <div class="card-body">
                    @forelse($data['grupUnitKerjas'] as $key => $grup_unit_kerja)
                    <div class="mb-2">
                        <div class="form-check">
                            {{ Form::checkbox('grup_unit_kerja[]', $grup_unit_kerja->unit_kerja_id, false, ['class' => 'form-check-input', 'id' => $grup_unit_kerja->unit_kerja_id, 'checked' => @$grup_unit_kerja->grups[0]->pivot->grup_unit_kerja_unit_kerja_id == $grup_unit_kerja->unit_kerja_id]) }}
                            {{ Form::label($grup_unit_kerja->unit_kerja_id, $grup_unit_kerja->unit_kerja_nama, ['class' => 'form-check-label']) }}
                        </div>
                    </div>
                    @empty
                    <p>Tidak ada Unit Kerja</p>
                    @endforelse
                </div>
            </div>
        </div> -->
    </div>
    {{ Form::submit('Simpan', ['class' => 'btn btn-success waitme w-100']) }}

    {{ Form::close() }}

</div>
@endsection