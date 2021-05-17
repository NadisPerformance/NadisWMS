<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilleSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('famille_supports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->unique();
            $table->string('Libelle')->unique();
            $table->string('etat');
            $table->string('type');
            $table->string('uniteReception');
            $table->string('uniteStockage');
            $table->string('unitePreparation');
            $table->string('uniteReapprovisionnement');
            $table->string('uniteExpedition');
            $table->float('hauteur');
            $table->float('largeur');
            $table->float('profondeur');
            $table->float('poids');
            $table->float('chargeMax');
            $table->float('hauteurMax');
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
        Schema::dropIfExists('famille_supports');
    }
}
