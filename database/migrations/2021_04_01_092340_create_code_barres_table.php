<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeBarresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_barres', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idConditionnementLogistique')->unsigned();
            $table->foreign('idConditionnementLogistique')->references('id')->on('conditionnement_logistiques')->onDelete('cascade');
            $table->bigInteger('value');
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
        Schema::dropIfExists('code_barres');
    }
}
