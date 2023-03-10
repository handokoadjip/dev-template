@extends('layouts.dashboard')

@section('title', 'Ubah Pengguna')

@section('content')
<div class="container-fluid">
    {{ Form::open(['route' => ['pengguna.update', $data['pengguna']->pengguna_id], 'method' => 'put']) }}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <div class="card-body">
                    {{ Form::hidden('pengguna_id', $data['pengguna']->pengguna_id) }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                {!! Form::label('pengguna_nik', 'NIK <small class="text-muted">(Nomor Induk Kependudukan)</small>', ['class' => 'form-label'], false) !!}
                                {{ Form::text('pengguna_nik', old('pengguna_nik', $data['pengguna']->pengguna_nik), ['placeholder' => 'NIK', 'class' => $errors->has('pengguna_nik') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'pengguna_nik', 'autofocus'=>'autofocus']) }}
                                @error('pengguna_nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {!! Form::label('pengguna_nip', 'NIP <small class="text-muted">(Nomor Induk Pegawai)</small>', ['class' => 'form-label'], false) !!}
                                {{ Form::text('pengguna_nip', old('pengguna_nip', $data['pengguna']->pengguna_nip), ['placeholder' => 'NIP', 'class' => $errors->has('pengguna_nip') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'pengguna_nip']) }}
                                @error('pengguna_nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_nama', 'Nama Lengkap', ['class' => 'form-label']) }}
                                {{ Form::text('pengguna_nama', old('pengguna_nama', $data['pengguna']->pengguna_nama), ['placeholder' => 'Nama Lengkap', 'class' => $errors->has('pengguna_nama') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'pengguna_nama']) }}
                                @error('pengguna_nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_email', 'Alamat Email', ['class' => 'form-label']) }}
                                {{ Form::text('pengguna_email', old('pengguna_email', $data['pengguna']->pengguna_email), ['placeholder' => 'Alamat Email', 'class' => $errors->has('pengguna_email') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'pengguna_email']) }}
                                @error('pengguna_email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_telp', 'Telp', ['class' => 'form-label']) }}
                                {{ Form::text('pengguna_telp', old('pengguna_telp', $data['pengguna']->pengguna_telp), ['placeholder' => 'Telp', 'class' => $errors->has('pengguna_telp') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'pengguna_telp']) }}
                                @error('pengguna_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_jenis_kelamin', 'Jenis Kelamin', ['class' => 'form-label']) }}
                                {{ Form::select('pengguna_jenis_kelamin', ['laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan'], old('pengguna_jenis_kelamin', $data['pengguna']->pengguna_jenis_kelamin), ['placeholder' => 'Jenis Kelamin', 'class' => $errors->has('pengguna_jenis_kelamin') ? 'form-select select2 is-invalid' : 'form-select select2', 'autocomplete'=>'pengguna_jenis_kelamin']) }}
                                @error('pengguna_jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_agama', 'Agama', ['class' => 'form-label']) }}
                                {{ Form::select('pengguna_agama', ['islam' => 'Islam', 'kristen khatolik' => 'Kristen Khatolik', 'kristen protestan' => 'Kristen Protestan', 'budha' => 'Budha', 'hindu' => 'Hindu', 'khong hu chu' => 'Khong hu chu', 'kepercayaan' => 'Kepercayaan'], old('pengguna_agama', $data['pengguna']->pengguna_agama), ['placeholder' => 'Pilih Agama', 'class' => $errors->has('pengguna_agama') ? 'form-select select2 is-invalid' : 'form-select select2', 'autocomplete'=>'pengguna_agama']) }}
                                @error('pengguna_agama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_unit_kerja_id', 'Unit Kerja', ['class' => 'form-label']) }}
                                {{ Form::select('pengguna_unit_kerja_id', $data['unitKerjas'], old('pengguna_unit_kerja_id', $data['pengguna']->pengguna_unit_kerja_id), ['placeholder' => 'Pilih Unit Kerja', 'class' => $errors->has('pengguna_unit_kerja_id') ? 'form-select select2 is-invalid' : 'form-select select2', 'autocomplete'=>'pengguna_unit_kerja_id']) }}
                                @error('pengguna_unit_kerja_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('grup_id', 'Grup', ['class' => 'form-label']) }}
                                {{ Form::select('grup_id', $data['grups'], old('grup_id', $data['pengguna']->grups[0]->grup_id), ['placeholder' => 'Pilih Grup', 'class' => $errors->has('grup_id') ? 'form-select select2 is-invalid' : 'form-select select2', 'autocomplete'=>'grup_id']) }}
                                @error('grup_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_alamat', 'Alamat', ['class' => 'form-label']) }}
                                {{ Form::textarea('pengguna_alamat', old('pengguna_alamat', $data['pengguna']->pengguna_alamat), ['placeholder' => 'Alamat', 'class' => $errors->has('pengguna_alamat') ? 'form-control is-invalid' : 'form-control', 'autocomplete'=>'pengguna_alamat', 'rows' => 3, ]) }}
                                @error('pengguna_alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                {{ Form::label('pengguna_password', 'Password', ['class' => 'form-label']) }}
                                {{ Form::password('pengguna_password', ['placeholder' => 'Password', 'class' => $errors->has('pengguna_password') ? 'form-control is-invalid' : 'form-control']) }}
                                <small class="text-muted">*) Jika ingin merubah password</small>
                                @error('pengguna_password')
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Akses Data Unit Kerja</h3>
                </div>
                <div class="card-body">
                    @forelse($data['penggunaUnitKerjas'] as $key => $penggunaUnitKerja)
                    <div class="mb-2">
                        <div class="form-check">
                            {{ Form::checkbox('pengguna_unit_kerja[]', $penggunaUnitKerja->unit_kerja_id, false, ['class' => 'form-check-input', 'id' => $penggunaUnitKerja->unit_kerja_id, 'checked' => @$penggunaUnitKerja->penggunas[0]->pivot->pengguna_unit_kerja_unit_kerja_id == $penggunaUnitKerja->unit_kerja_id]) }}
                            {{ Form::label($penggunaUnitKerja->unit_kerja_id, $penggunaUnitKerja->unit_kerja_nama, ['class' => 'form-check-label']) }}
                        </div>
                    </div>
                    @empty
                    <p>Tidak ada Unit Kerja</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection
