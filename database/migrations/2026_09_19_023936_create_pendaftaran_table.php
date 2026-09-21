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
    Schema::create('pendaftaran', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('nim', 50);
        $table->string('email');
        $table->string('no_hp', 30);
        $table->enum('jenis_kelamin', [
            'Laki-laki',
            'Perempuan'
        ]);
       $table->text('alamat');
        $table->string('angkatan', 20);
        $table->text('alasan_bergabung');
        $table->enum('status', [
            'Menunggu',
            'Diterima',
            'Ditolak'
        ])->default('Menunggu');
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
        Schema::dropIfExists('pendaftaran');
    }
};
