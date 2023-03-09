@extends('layouts.dashboard')

@section('title', 'Informasi Pengguna')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title">Biodata</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td style="width: 30%;">NIK</td>
                            <td style="width: 5px;">:</td>
                            <td>{{ $data['pengguna']->pengguna_nik }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">NIP</td>
                            <td style="width: 5px;">:</td>
                            <td>{{ @$data['pengguna']->pengguna_nip ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Nama Lengkap</td>
                            <td style="width: 5px;">:</td>
                            <td>{{ $data['pengguna']->pengguna_nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Jenis Kelamin</td>
                            <td style="width: 5px;">:</td>
                            <td>{{ $data['pengguna']->pengguna_jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Agama</td>
                            <td style="width: 5px;">:</td>
                            <td>{{ $data['pengguna']->pengguna_agama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Alamat</td>
                            <td style="width: 5px;">:</td>
                            <td>{{ $data['pengguna']->pengguna_alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td style="width: 30%;">Email</td>
                            <td style="width: 5px;">:</td>
                            <td>{{ $data['pengguna']->pengguna_email }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Telp</td>
                            <td style="width: 5px;">:</td>
                            <td>{{ $data['pengguna']->pengguna_telp }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Grup</td>
                            <td style="width: 5px;">:</td>
                            <td>{{ $data['pengguna']->grups[0]->grup_nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Unit Kerja</td>
                            <td style="width: 5px;">:</td>
                            <td>{{ $data['pengguna']->unitKerja->unit_kerja_nama }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection