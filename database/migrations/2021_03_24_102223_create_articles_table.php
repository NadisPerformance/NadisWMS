<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codeArticle');
            $table->string('steGestionnaire');
            $table->string('etat');
            $table->string('libelle');
            $table->text('libelleCourt');
            $table->string('libelleLong');
            $table->bigInteger('idFamille')->unsigned();
            $table->foreign('idFamille')->references('id')->on('familles')->onDelete('cascade');
            $table->bigInteger('idModeleStockage')->unsigned();
            $table->foreign('idModeleStockage')->references('id')->on('modele_stockages')->onDelete('cascade');
            $table->bigInteger('idFamilleColisage')->unsigned();
            $table->foreign('idFamilleColisage')->references('id')->on('famille_colisages')->onDelete('cascade');
            $table->bigInteger('idFamilleQuarantaine')->unsigned();
            $table->foreign('idFamilleQuarantaine')->references('id')->on('famille_quarantaines')->onDelete('cascade');
            $table->bigInteger('idMarque')->unsigned();
            $table->foreign('idMarque')->references('id')->on('marques')->onDelete('cascade');
            $table->bigInteger('idCategorie')->unsigned();
            $table->foreign('idCategorie')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('idVariant')->unsigned();
            $table->foreign('idVariant')->references('id')->on('variants')->onDelete('cascade');
            $table->bigInteger('idPrix')->unsigned();
            $table->foreign('idPrix')->references('id')->on('prixes')->onDelete('cascade');
            $table->bigInteger('idSociete')->unsigned();
            $table->foreign('idSociete')->references('id')->on('societes')->onDelete('cascade');
            $table->boolean('disponibilite')->default(0);
            $table->bigInteger('referenceFournisseur');
            $table->bigInteger('referenceN3');
            $table->string('unite');
            $table->bigInteger('precision')->nullable();
            $table->string('lectureCodeBarre')->nullable();
            $table->boolean('colisable')->default(0);
            $table->boolean('lotsEntree')->default(0);
            $table->boolean('lotsSortie')->default(0);
            $table->boolean('gestionDLV')->default(0);
            $table->boolean('entreeSN')->default(0);
            $table->boolean('sortieSN')->default(0);
            $table->boolean('stockSN')->default(0);
            $table->bigInteger('numModelisationSN')->nullable();
            $table->bigInteger('nbrMoisJour_DureeVieEntrepôt')->default(0);
            $table->bigInteger('seuilAlertePerime')->nullable();
            $table->bigInteger('seuilBlocagePerime')->nullable();
            $table->date('dateLV')->nullable();
            $table->date('dateFabrication')->nullable();
            $table->date('dateContrat')->nullable();
            $table->bigInteger('gestionFenetre')->nullable();
            $table->string('rotation')->nullable();
            $table->boolean('rangementPicking')->default(0);
            $table->string('PCB')->nullable();
            $table->float('qteMaxType')->nullable();
            $table->float('SeuilApprovisionnementMin');
            $table->float('SeuilApprovisionnementMax');
            $table->boolean('notionDangerosite')->default(0);
            $table->boolean('notionAlcool')->default(0);
            $table->text('instructions')->nullable();
            $table->string('qualite')->nullable();
            $table->string('racine')->nullable();
            $table->string('variante')->nullable();
            $table->float('qtes')->nullable();
            $table->float('qteAlcool')->nullable();
            $table->string('dangerositeCategorie')->nullable();
            $table->text('dangerositePrecaution')->nullable();
            $table->string('dangerositeStockage')->nullable();
            $table->string('dangerositeManipulation')->nullable();
            $table->string('userName')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
