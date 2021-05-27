<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idSite')->unsigned()->nullable();
            $table->foreign('idSite')->references('id')->on('sites')->onDelete('cascade');
            $table->bigInteger('idFournisseur')->unsigned()->nullable();
            $table->foreign('idFournisseur')->references('id')->on('fournisseurs')->onDelete('cascade');
            $table->bigInteger('idClient')->unsigned()->nullable();
            $table->foreign('idClient')->references('id')->on('clients')->onDelete('cascade');
            $table->bigInteger('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->string('type');
            $table->string('livraison');
            $table->string('siege');
            $table->string('facturation');
            $table->string('raisonSociale')->nullable();
            $table->string('CP');
            $table->string('Ville');
            $table->string('pays');
            $table->string('siteInternet')->nullable();
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
        Schema::dropIfExists('adresses');
    }
}
