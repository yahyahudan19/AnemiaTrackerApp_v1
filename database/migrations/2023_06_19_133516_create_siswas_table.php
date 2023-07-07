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
        Schema::create('siswas', function (Blueprint $table) {
            $table->uuid('id_siswa')->primary();
            $table->uuid('user_id');
            $table->string('nama_siswa');
            $table->string('nis_siswa')->unique();
            $table->string('ttl_siswa');
            $table->string('umur_siswa');
            $table->text('alamat_siswa');
            $table->enum('jenisk_siswa', ['Laki-Laki', 'Perempuan']);
            $table->string('ayah_siswa');
            $table->string('ibu_siswa');
            $table->integer('anemia_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('anemia_id')->references('id_anemia')->on('anemias');
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
        Schema::dropIfExists('siswas');
    }
};
