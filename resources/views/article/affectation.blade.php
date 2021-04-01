<div class='form-control'>
    <fieldset>
        <div class="modal-header">
            <h4 class="modal-title">Afféctation des tableaux</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Famille d'article" id="idFamille" class="block mt-1 w-full"
                            type="number" name="idFamille" value="{{old('idFamille',$article->idFamille ?? null)}}" required  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Famille de colisage" id="idFamilleColisage" class="block mt-1 w-full"
                            type="number" name="idFamilleColisage" value="{{old('idFamilleColisage',$article->idFamilleColisage ?? null)}}" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Famille de quarantaine" id="idFamilleQuarantaine"
                            class="block mt-1 w-full" type="number" name="idFamilleQuarantaine"
                            value="{{old('idFamilleQuarantaine',$article->idFamilleQuarantaine ?? null)}}" required  />
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Modele de stockage" id="idModeleStockage" class="block mt-1 w-full"
                            type="number" name="idModeleStockage" value="{{old('idModeleStockage',$article->idModeleStockage ?? null)}}" required  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Marque" id="idMarque" class="block mt-1 w-full" type="number"
                            name="idMarque" value="{{old('idMarque',$article->idMarque ?? null)}}" required  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Categorie" id="idCategorie" class="block mt-1 w-full" type="number"
                            name="idCategorie" value="{{old('idCategorie',$article->idCategorie ?? null)}}" required  />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Societe" id="idSociete" class="block mt-1 w-full" type="number"
                            name="idSociete" value="{{old('idSociete',$article->idSociete ?? null)}}" required  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Prix" id="idPrix"
                            class="block mt-1 w-full" type="number" name="idPrix"
                            value="{{old('idPrix',$article->idPrix ?? null)}}" required  />
                    </div>
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Variant" id="idVariant" class="block mt-1 w-full" type="number"
                            name="idVariant" value="{{old('idVariant',$article->idVariant ?? null)}}" required  />
                    </div>
                </div>
            </div>
            

        </div>




</div>


</fieldset>
</div>
