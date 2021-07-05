<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEchographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echographies', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("lot");
            $table->double("nbreFoetus");
            $table->date("dateEcho");
            $table->unsignedBigInteger("ovins_RFID");
            $table->foreign("ovins_RFID")->references("RFID")->on("ovins")->onDelete("cascade");
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
        Schema::dropIfExists('echographies');
    }
}
