<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit')->nullable();
            $table->year('tahunterbit')->nullable();
            $table->bigInteger('ISBN')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('jenis');
            $table->string('mapel')->nullable();
            $table->string('buku');
            $table->string('cover');
            $table->decimal('ukuran');
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
        Schema::dropIfExists('books');
    }
}
