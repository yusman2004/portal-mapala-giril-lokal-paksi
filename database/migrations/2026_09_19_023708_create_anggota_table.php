<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('anggota', function (Blueprint $table) {
        $table->id();

        $table->string('nama_lengkap');
        $table->string('nim')->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->string('no_hp')->nullable();
        $table->text('alamat')->nullable();
        $table->string('angkatan')->nullable();
        $table->string('foto')->nullable();
        $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
};
