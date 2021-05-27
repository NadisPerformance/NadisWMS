<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignePlanTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_plan_transports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idPlanTransporteur')->unsigned()->nullable();
            $table->foreign('idPlanTransporteur')->references('id')->on('plan_transports')->onDelete('cascade');
            $table->bigInteger('codePaye')->nullable();
            $table->bigInteger('codeDepartement')->nullable();
            $table->string('zone')->nullable();
            $table->bigInteger('codePostal')->nullable();
            $table->float('poidsMin')->default(0);
            $table->float('poidsMax')->default(0);  
            $table->bigInteger('nbColisMin')->default(0);  
            $table->bigInteger('nbColisMax')->default(0);  
            $table->float('tarif')->default(0); 
            $table->string('modeCalcul');
            $table->float('uniteCalcul')->nullable();
            $table->float('arrondi')->nullable();
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
        Schema::dropIfExists('ligne_plan_transports');
    }
}
