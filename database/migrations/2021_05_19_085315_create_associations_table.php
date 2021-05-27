<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idTransporteur')->unsigned()->nullable();
            $table->foreign('idTransporteur')->references('id')->on('transporteurs')->onDelete('cascade');
            $table->bigInteger('idSociete')->unsigned()->nullable();
            $table->foreign('idSociete')->references('id')->on('societes')->onDelete('cascade');
            $table->string('prestation');
            $table->string('type');
            $table->bigInteger('numCompte');  
            $table->bigInteger('plageColis');  
            $table->bigInteger('codeInterne');  
            $table->boolean('palettisation')->default(0);
            $table->boolean('echangeEDI')->default(0);
            $table->boolean('impressionCN23')->default(0);
            $table->boolean('transporteurParDefaut')->default(0);
            $table->boolean('transporteurOptimiser')->default(0);

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
        Schema::dropIfExists('associations');
    }
}
