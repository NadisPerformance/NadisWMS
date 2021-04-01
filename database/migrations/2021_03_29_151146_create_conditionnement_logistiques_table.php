<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionnementLogistiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditionnement_logistiques', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idArticle')->unsigned();
            $table->foreign('idArticle')->references('id')->on('articles')->onDelete('cascade');
            $table->bigInteger('code');
            $table->text('Libelle')->nullable();
            $table->string('etat');
            $table->boolean('enEtat')->default(0);
            $table->boolean('UniteStockage')->default(0);
            $table->boolean('UnitePreparation')->default(0);
            $table->boolean('UniteReception')->default(0);
            $table->boolean('gerbage')->default(0);
            $table->float('borneMax');
            $table->float('borneMin');
            $table->float('poids');
            $table->float('longueur');
            $table->float('largeur');
            $table->float('profondeur');
            $table->float('qte');
            $table->string('type');
            $table->bigInteger('coefficient');
            $table->string('filiation');
            $table->string('typeFiliation');
            $table->string('planPalettisation');
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
        Schema::dropIfExists('conditionnement_logistiques');
    }
}
