<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilleSNSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('famille_s_n_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code');
            $table->string('type');
            $table->boolean('fixe')->default(0);
            $table->bigInteger('longueur');
            $table->bigInteger('tailleMax');
            $table->string('typeCaractere');
            $table->bigInteger('alphanumerique');
            $table->bigInteger('numerique');
            $table->bigInteger('prefixe');
            $table->bigInteger('suffixe');
            $table->string('typeCheckdigit');
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
        Schema::dropIfExists('famille_s_n_s');
    }
}
