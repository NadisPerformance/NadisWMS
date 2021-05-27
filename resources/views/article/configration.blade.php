
    <fieldset>
        <div class="modal-header"> 
            <h1 class="modal-title">Configration</h1>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input value=1 @if(old('disponibilite',$article->disponibilite ?? null)==1) checked @endif  class="form-check-input" name="disponibilite" type="checkbox" id="disponibilite">
                        <label class="form-check-label" for="disponibilite">Disponibilite</label>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input value=1 @if(old('colisable',$article->colisable ?? null)==1) checked @endif class="form-check-input" name="colisable" type="checkbox" id="colisable">
                        <label class="form-check-label" for="colisable">Colisable</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input value=1 @if(old('rangementPicking',$article->rangementPicking ?? null)==1) checked @endif class="form-check-input" name="rangementPicking" type="checkbox" id="rangementPicking">
                        <label class="form-check-label" for="rangementPicking">Rangement Picking</label>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input value=1 @if(old('lotsEntree',$article->lotsEntree ?? null)==1) checked @endif class="form-check-input" name="lotsEntree" type="checkbox" id="lotsEntree">
                        <label class="form-check-label" for="lotsEntree">Lots d'ntree</label>
                    </div>

                </div>
                <div class="col-md-4">
                    <div  class="form-check form-switch">
                        <input value=1 @if(old('lotsSortie',$article->lotsSortie ?? null)==1) checked @endif class="form-check-input" name="lotsSortie" type="checkbox" id="lotsSortie">
                        <label class="form-check-label" for="lotsSortie">Lots de sortie</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input value=1 @if(old('gestionDLV',$article->gestionDLV ?? null)==1) checked @endif class="form-check-input" name="gestionDLV" type="checkbox"
                            onClick="Affiche('gestionDLV','dlv')" id="gestionDLV">
                        <label class="form-check-label" for="gestionDLV">Gestion DLV</label>
                        <div style="display: none" id="dlv">
                            <div class="form-group">
                                <label class="form-label">Date LV</label>
                                <x-jet-input placeholder="Date LV" class="block mt-1 w-full" type="date" name="dateLV"
                                value="{{old('dateLV',$article->dateLV ?? null)}}"  />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Date Fabrication</label>
                                <x-jet-input placeholder="Date Fabrication" class="block mt-1 w-full" type="date"
                                    name="dateFabrication" value="{{old('dateFabrication',$article->dateFabrication ?? null)}}"  />
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input value=1 @if(old('entreeSN',$article->entreeSN ?? null)==1) checked @endif class="form-check-input" name="entreeSN" type="checkbox" id="entreeSN"
                            onClick="Affiche('entreeSN','numModelisationSN')">
                        <label class="form-check-label" for="entreeSN">Gestion S/N en entrée </label>
                    </div>
                    <div style="display: none" id="numModelisationSN">
                        <div class="form-group">
                            <x-jet-input placeholder="Numéro modélisation de S/N" class="block mt-1 w-full"
                                type="number" name="numModelisationSN" value="{{old('numModelisationSN',$article->numModelisationSN ?? null)}}"  />
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input value=1 @if(old('sortieSN',$article->sortieSN ?? null)==1) checked @endif class="form-check-input" name="sortieSN" type="checkbox" id="sortieSN">
                        <label class="form-check-label" for="sortieSN">Gestion S/N en sortie </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input value=1 @if(old('disponibilite',$article->disponibilite ?? null)==1) checked @endif class="form-check-input" name="stockSN" type="checkbox" id="stockSN">
                        <label class="form-check-label" for="stockSN">Gestion S/N en stock </label>
                    </div>
                </div>
            </div>
            




            <div class="row">
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input value=1 @if(old('notionAlcool',$article->notionAlcool ?? null)==1) checked @endif
                         class="form-check-input" name="notionAlcool" type="checkbox" id="notionAlcool" onClick="Affiche('notionAlcool','qte')">
                        <label class="form-check-label" for="notionAlcool">Notion d'alcoole</label>
                    </div>
                    <div  style="display: none" id="qte">
                        <div class="form-group">
                            <x-jet-input placeholder="Quantité d'alcool" class="block mt-1 w-full" type="number" name="qteAlcool" id="qteAlcool"
                            value="{{old('qteAlcool',$article->qteAlcool ?? null)}}"  />
                        </div>
                    </div>
                </div>









                <div class="col-md-4">
                    <div class="form-check form-switch"> 
                        <input value=1 @if(old('notionDangerosite',$article->notionDangerosite ?? null)==1) checked @endif
                         class="form-check-input" name="notionDangerosite" type="checkbox"
                             id="notionDangerosite" onClick="Affiche('notionDangerosite','ld')">
                        <label class="form-check-label" for="notionDangerosite">Notion de dangerosité</label>
                    </div>
                    <div style="display: none" id="ld">
                        <fieldset >            
                           <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <x-jet-input placeholder="Categorie" id="dangerositeCategorie"
                                            class="block mt-1 w-full" type="text" name="dangerositeCategorie"
                                            value="{{old('dangerositeCategorie',$article->dangerositeCategorie ?? null)}}"  />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <x-jet-input placeholder="Stockage" id="dangerositeStockage" class="block mt-1 w-full"
                                            type="text" name="dangerositeStockage" value="{{old('dangerositeStockage',$article->dangerositeStockage ?? null)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <x-jet-input placeholder="Manipulation" id="dangerositeManipulation" class="block mt-1 w-full"
                                            type="text" name="dangerositeManipulation" value="{{old('dangerositeManipulation',$article->dangerositeManipulation ?? null)}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <x-jet-label for="dangerositePrecaution" value="{{ __('Precaution') }}" />
                                        <textarea  class="form-control" id="dangerositePrecaution" rows="5"
                                            type="textarea" name="dangerositePrecaution" value="{{old('dangerositePrecaution',$article->dangerositePrecaution ?? null)}}"  >
                                          </textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>


            <script>
                function Affiche(attr1, attr2) {
                    var x = document.getElementById(attr1);
                    var y = document.getElementById(attr2);
                    if (x.checked == true) {
                        y.style.display = "block";
                    } else {
                        y.style.display = "none";
                    }
                }

            </script>


    </fieldset>
</div>
</div>


</fieldset>

