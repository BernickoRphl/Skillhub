<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->constrained('pesertas')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->timestamp('registered_at')->nullable();
            $table->timestamps();

            $table->unique(['peserta_id','kelas_id']); // hindari duplikat pendaftaran
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
}
