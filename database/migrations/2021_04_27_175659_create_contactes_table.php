<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idSite')->unsigned();
            $table->foreign('idSite')->references('id')->on('sites')->onDelete('cascade');
            $table->bigInteger('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->string('responsableSociete');
            $table->string('chefEquipe');
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
        Schema::dropIfExists('contactes');
    }
}
