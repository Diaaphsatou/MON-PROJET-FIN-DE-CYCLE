<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOvinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ovins', function (Blueprint $table) {
            $table->bigIncrements('rfid');
            $table->string("sexe");
            $table->date("dateDeNaissance");
            $table->string("race");
            $table->string("nom");
            $table->double("poids");
            $table->string("codeEntree");
            $table->date("dateEntree");
            $table->string("codeSortie")->nullable();
            $table->date("dateDeSortie")->nullable();
            $table->integer("prix");
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
        Schema::dropIfExists('ovins');
    }
}
