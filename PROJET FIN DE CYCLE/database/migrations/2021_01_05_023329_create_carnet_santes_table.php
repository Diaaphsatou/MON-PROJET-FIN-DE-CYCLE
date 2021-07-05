<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarnetSantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carnet_santes', function (Blueprint $table) {
             $table->bigIncrements("id");
            $table->date("dateDebutTraitement");
            $table->date("dateFinTraitement");
            $table->string("traitement");
            $table->double("numOrdenance");
            $table->string("nomProduit");
            $table->string("motifDuTraitement");
            $table->string("intervenant");
            $table->date("dateRemiseEnVente");
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
        Schema::dropIfExists('carnet_santes');
    }
}
