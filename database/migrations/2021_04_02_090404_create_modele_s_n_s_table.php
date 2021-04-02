<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleSNSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_s_n_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idArticle')->unsigned();
            $table->foreign('idArticle')->references('id')->on('articles')->onDelete('cascade');
            $table->string('etat');
            $table->text('Libelle');
            $table->bigInteger('nbAttendus');
            $table->string('sequenceReleve');
            $table->string('regleSouplesse');
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
        Schema::dropIfExists('modele_s_n_s');
    }
}
