<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneModeleSNSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_modele_s_n_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idModeleSN')->unsigned();
            $table->foreign('idModeleSN')->references('id')->on('modele_s_n_s')->onDelete('cascade');
            $table->bigInteger("nbLigne");
            $table->string("familleSN");
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
        Schema::dropIfExists('ligne_modele_s_n_s');
    }
}
