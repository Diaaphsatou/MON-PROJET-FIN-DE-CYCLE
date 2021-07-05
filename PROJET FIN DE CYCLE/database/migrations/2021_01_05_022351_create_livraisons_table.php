<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->date("date");
            $table->string("destination");
            $table->string("transport");
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
        Schema::dropIfExists('livraisons');
    }
}
