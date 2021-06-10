<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasakhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugasakhirs', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('mahasiswa_id')->unique();
;           $table->string('judul');
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas');
        });
        // Schema::table('tugasakhirs', function (Blueprint $table){
        //     $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugasakhirs');
    }
}
