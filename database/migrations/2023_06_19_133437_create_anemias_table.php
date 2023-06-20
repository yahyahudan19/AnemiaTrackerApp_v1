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
        Schema::create('anemias', function (Blueprint $table) {
            $table->increments('id_anemia');
            $table->string('tinggi_anemia');
            $table->string('berat_anemia');
            $table->enum('riwayat_anemia',['Pernah','Tidak Pernah']);
            $table->enum('minum_anemia',['Pernah','Tidak Pernah']);
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
        Schema::dropIfExists('anemias');
    }
};
