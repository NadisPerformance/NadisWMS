<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_transports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idTransporteur')->unsigned()->nullable();
            $table->foreign('idTransporteur')->references('id')->on('transporteurs')->onDelete('cascade');
            $table->bigInteger('code')->unique();
            $table->string('Libelle')->unique();
            $table->string('etat');
            $table->string('type');
            $table->string('pays');
            $table->date('dateDebutValidite'); 
            $table->date('dateFinValidite');
            $table->string('modeRecherche');
            $table->string('modeCalcul');
            $table->float('taxeGazole')->default(0);
            $table->float('taxeSurete')->default(0);
            $table->float('ecotaxe')->default(0);
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
        Schema::dropIfExists('plan_transports');
    }
}
