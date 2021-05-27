<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->unique();
            $table->string('Libelle')->unique();
            $table->string('etat');
            $table->string('type');
            $table->bigInteger('codeLangueDoc');
            $table->bigInteger('codeLangueData');
            $table->bigInteger('numSiret');
            $table->bigInteger('contraDate'); 
            $table->string('expeditionPartielle');
            $table->string('regroupementLogique');
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
        Schema::dropIfExists('clients');
    }
}
