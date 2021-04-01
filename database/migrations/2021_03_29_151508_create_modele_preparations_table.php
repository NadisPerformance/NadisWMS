<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelePreparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_preparations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idConditionnementLogistique')->unsigned();
            $table->foreign('idConditionnementLogistique')->references('id')->on('conditionnement_logistiques')->onDelete('cascade');
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
        Schema::dropIfExists('modele_preparations');
    }
}
