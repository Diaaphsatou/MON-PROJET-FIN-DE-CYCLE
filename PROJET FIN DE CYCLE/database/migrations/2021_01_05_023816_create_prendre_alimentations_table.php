<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrendreAlimentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prendre_alimentations', function (Blueprint $table) {
            $table->unsignedBigInteger("ovins_RFID");
            $table->foreign("ovins_RFID")->references("RFID")->on("ovins")->onDelete("cascade");
             $table->unsignedBigInteger("alimentations_id");
            $table->foreign("alimentations_id")->references("id")->on("alimentations")->onDelete("cascade");
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
        Schema::dropIfExists('prendre_alimentations');
    }
}
