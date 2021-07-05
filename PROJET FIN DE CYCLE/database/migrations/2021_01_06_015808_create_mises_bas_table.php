<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisesBasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mises_bas', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->date("date");
            $table->integer("nombreAgneauVivant");
            $table->integer("nombreAgneauMort");
            $table->integer("ProblemeMisesBas");
            $table->string("periodeMisesBas");
            $table->string("methode");
            $table->string("commentaire");
            $table->unsignedBigInteger("ovins_RFID");
            $table->foreign("ovins_RFID")->references("RFID")->on("ovins")->onDelete("cascade");
            $table->unsignedBigInteger("echographies_id");
            $table->foreign("echographies_id")->references("id")->on("echographies")->onDelete("cascade");
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
        Schema::dropIfExists('mises_bas');
    }
}
