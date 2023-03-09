<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->string('pengguna_unit_kerja_id')->after('pengguna_nama')->nullable();
            $table->string('pengguna_nik')->after('pengguna_nama')->unique()->nullable();
            $table->string('pengguna_nip')->after('pengguna_nama')->unique()->nullable();
            $table->string('pengguna_telp')->after('pengguna_nama')->unique();
            $table->string('pengguna_jenis_kelamin')->after('pengguna_password');
            $table->string('pengguna_agama')->after('pengguna_password');
            $table->text('pengguna_alamat')->after('pengguna_password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropColumn('pengguna_alamat');
            $table->dropColumn('pengguna_agama');
            $table->dropColumn('pengguna_jenis_kelamin');
            $table->dropColumn('pengguna_telp');
            $table->dropColumn('pengguna_nip');
            $table->dropColumn('pengguna_nik');
            $table->dropColumn('pengguna_unit_kerja_id');
        });
    }
}
