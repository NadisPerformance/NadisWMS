<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationTransporteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectation_transporteurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idPlanTransporteur')->unsigned()->nullable();
            $table->foreign('idPlanTransporteur')->references('id')->on('plan_transports')->onDelete('cascade');
            $table->bigInteger('nbOP');
            $table->bigInteger('codePaye');
            $table->bigInteger('codeZone');
            $table->bigInteger('codeDepartement');
            $table->bigInteger('codePostal');
            $table->float('poids');
            $table->bigInteger('nbColis');  
            $table->float('montant');
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
        Schema::dropIfExists('affectation_transporteurs');
    }
}
