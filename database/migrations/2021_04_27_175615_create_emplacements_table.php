<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmplacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplacements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idArticle')->unsigned();
            $table->foreign('idArticle')->references('id')->on('articles')->onDelete('cascade');
            $table->bigInteger('idMagasin')->unsigned();
            $table->foreign('idMagasin')->references('id')->on('magasins')->onDelete('cascade');
            $table->bigInteger('idSecteur')->unsigned();
            $table->foreign('idSecteur')->references('id')->on('secteurs')->onDelete('cascade');
            $table->bigInteger('idFamilleSupport')->unsigned();
            $table->foreign('idFamilleSupport')->references('id')->on('famille_supports')->onDelete('cascade');
            $table->bigInteger('code')->unique();
            $table->string('Libelle')->unique();
            $table->string('LibelleClient');
            $table->string('type');
            $table->float('capacite');
            $table->boolean('estPicking')->default(0);
            $table->string('usage');
            $table->string('etat');
            $table->float('hauteur');
            $table->float('largeur');
            $table->float('profondeur');
            $table->float('poids');
            $table->float('volume');
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
        Schema::dropIfExists('emplacements');
    }
}
