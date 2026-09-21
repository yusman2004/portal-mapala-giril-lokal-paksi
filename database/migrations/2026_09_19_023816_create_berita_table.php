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
    Schema::create('berita', function (Blueprint $table) {
        $table->id();

        $table->foreignId('kategori_id')
              ->constrained('kategori_berita')
              ->cascadeOnDelete();

        $table->string('judul');
        $table->string('slug')->unique();
        $table->text('isi');
        $table->string('gambar')->nullable();

        $table->enum('status', ['Draft', 'Publish'])
              ->default('Draft');

        $table->timestamp('published_at')->nullable();

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
        Schema::dropIfExists('berita');
    }
};
