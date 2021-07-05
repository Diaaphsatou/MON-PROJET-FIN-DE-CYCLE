<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_livraisons', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->integer("num_bon_livraison");
            $table->integer("tel_bergerie");
            $table->string("adresse");
            $table->integer("num_client");
            $table->integer("num_commande");
            $table->date("date_commande");
            $table->string("description_livraison");
            $table->integer("quantite_commande");
            $table->integer("quantite_livrer");
            $table->integer("quantite_restant_a_livrer");
            $table->string("observations");
            
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
        Schema::dropIfExists('bon_livraisons');
    }
}
