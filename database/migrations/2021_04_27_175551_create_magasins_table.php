<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagasinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magasins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idSite')->unsigned();
            $table->foreign('idSite')->references('id')->on('sites')->onDelete('cascade');
            $table->bigInteger('code')->unique();
            $table->string('Libelle')->unique();
            $table->string('etat');
            $table->string('type');
            $table->bigInteger('nombreMeubles');
            $table->bigInteger('nombreColonnes');
            $table->bigInteger('nombreNiveaux');
            $table->bigInteger('nombreIndices');
            $table->string('separateur');
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
        Schema::dropIfExists('magasins');
    }
}
