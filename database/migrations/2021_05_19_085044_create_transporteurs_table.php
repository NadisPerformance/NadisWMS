<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransporteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporteurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->unique();
            $table->string('Libelle')->unique();
            $table->string('etat');
            $table->bigInteger('codeLangueDoc');
            $table->bigInteger('codeLangueData');
            $table->bigInteger('numSiret');
            $table->boolean('mouvementReception')->default(0);
            $table->boolean('mouvementInterne')->default(0);
            $table->boolean('mouvementExpedition')->default(0);
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
        Schema::dropIfExists('transporteurs');
    }
}
