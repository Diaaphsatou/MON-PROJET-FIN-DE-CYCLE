<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentations', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("categories_ovins");
            $table->string("typeAliments");
            $table->integer("quantites");
            $table->string("periodes");
            $table->string("methode");
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
        Schema::dropIfExists('alimentations');
    }
}
