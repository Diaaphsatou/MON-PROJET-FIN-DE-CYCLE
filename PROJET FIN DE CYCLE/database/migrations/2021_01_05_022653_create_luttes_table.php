<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuttesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luttes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("ovins_RFID");
            $table->integer("numLotLutte");
            $table->foreign("ovins_RFID")->references("RFID")->on("ovins")->onDelete("cascade");
            $table->date("dateDebutLutte");
            $table->date("dateFinLutte");
            $table->integer("RFIDBelier");
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
        Schema::dropIfExists('luttes');
    }
}
