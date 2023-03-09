<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnPenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->renameColumn('id', 'pengguna_id');
            $table->renameColumn('name', 'pengguna_nama');
            $table->renameColumn('email', 'pengguna_email');
            $table->renameColumn('email_verified_at', 'pengguna_email_verifikasi_pada');
            $table->renameColumn('password', 'pengguna_password');
            $table->renameColumn('remember_token', 'pengguna_remember_token');
            $table->renameColumn('created_at', 'pengguna_dibuat_pada');
            $table->renameColumn('updated_at', 'pengguna_diubah_pada');
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
            $table->renameColumn('pengguna_diubah_pada', 'updated_at');
            $table->renameColumn('pengguna_dibuat_pada', 'created_at');
            $table->renameColumn('pengguna_remember_token', 'remember_token');
            $table->renameColumn('pengguna_password', 'password');
            $table->renameColumn('pengguna_email_verifikasi_pada', 'email_verified_at');
            $table->renameColumn('pengguna_email', 'email');
            $table->renameColumn('pengguna_nama', 'name');
            $table->renameColumn('pengguna_id', 'id');
        });
    }
}
