
    <fieldset>
        <div class="modal-header">
            <h1 class="modal-title">Association</h1>
        </div>
        
            
        
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-label for="idFamille" value="{{ __('Famille') }}" />
                        <select name="idFamille"  class="form-select"
                            aria-label="Default select example">
                            @forelse ($familles as $famille)
                            <option value="{{$famille->id}}"
                                {{(old('idFamille', $article->idFamille ??null) == $famille->id) ? 'selected':''}}>
                            {{$famille->name}}
                            </option> 
                            @empty
                            <option value="">vide</option>    
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-label for="idFamilleColisage" value="{{ __('Famille de colisage') }}" />
                        <select name="idFamilleColisage"  class="form-select"
                            aria-label="Default select example">
                            @forelse ($familleColisages as $fammilleColisage)
                            <option value="{{$fammilleColisage->id}}"
                                {{(old('idFamilleColisage', $article->idFamilleColisage ??null) == $fammilleColisage->id) ? 'selected':''}}>
                                {{$fammilleColisage->name}}
                            </option> 
                            @empty
                            <option value="">vide</option>    
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-label for="idFamilleQuarantaine" value="{{ __('Famille de quarantaine') }}" />
                        <select name="idFamilleQuarantaine"  class="form-select"
                            aria-label="Default select example">
                            @forelse ($familleQuarantaines as $famille)
                            <option value="{{$famille->id}}"
                                {{(old('idFamilleQuarantaine', $article->idFamilleQuarantaine ??null) == $famille->id) ? 'selected':''}}>
                                {{$famille->id}}
                            </option> 
                            @empty
                            <option value="">vide</option>    
                            @endforelse
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-label for="idMarque" value="{{ __('Marque') }}" />
                        <select name="idMarque"  class="form-select"
                            aria-label="Default select example">
                            @forelse ($marques as $marque)
                            <option value="{{$marque->id}}"
                                {{(old('idMarque', $article->idMarque ??null) == $marque->id) ? 'selected':''}}>
                                {{$marque->name}}
                            </option> 
                            @empty
                            <option value="">vide</option>    
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-label for="idCategorie" value="{{ __('Categorie') }}" />
                        <select name="idCategorie"  class="form-select"
                            aria-label="Default select example">
                            @forelse ($categories as $categorie)
                            <option value="{{$famille->id}}"
                                {{(old('idCategorie', $article->idCategorie ??null) == $categorie->id) ? 'selected':''}}>
                                {{$categorie->value}}
                            </option> 
                            @empty
                            <option value="">vide</option>    
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-label for="idModeleStockage" value="{{ __('Modele de stockage') }}" />
                        <select name="idModeleStockage"  class="form-select"
                            aria-label="Default select example">
                            @forelse ($modeleStockages as $model)
                            <option value="{{$famille->id}}"
                                {{(old('idModeleStockage', $article->idModeleStockage ??null) == $model->id) ? 'selected':''}}>
                                {{$model->id}}
                            </option> 
                            @empty
                            <option value="">vide</option>    
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-label for="idVariant" value="{{ __('Famille') }}" />
                        <select name="idVariant"  class="form-select"
                            aria-label="Default select example">
                            @forelse ($variants as $variant)
                            <option value="{{$variant->id}}"
                                {{(old('idVariant', $article->idVariant ??null) == $variant->id) ? 'selected':''}}>
                                {{$variant->id}}
                            </option> 
                            @empty
                            <option value="">vide</option>    
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-label for="idSociete" value="{{ __('Societe') }}" />
                        <select name="idSociete"  class="form-select"
                            aria-label="Default select example">
                            @forelse ($societes as $societe)
                            <option value="{{$societe->id}}"
                                {{(old('idSociete', $article->idSociete ??null) == $societe->id) ? 'selected':''}}>
                                {{$societe->id}}</option> 
                            @empty
                            <option value="">vide</option>    
                            @endforelse
                        </select>
                    </div>
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-label for="idPrix" value="{{ __('Prix') }}" />
                        <select name="idPrix"  class="form-select"
                            aria-label="Default select example">
                            @forelse ($prixes as $prix)
                            <option value="{{$prix->id}}"
                                {{(old('idPrix', $article->idPrix ??null) == $prix->id) ? 'selected':''}}>
                                {{$prix->id}}
                            </option> 
                            @empty
                            <option value="">vide</option>    
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            

        </div>




</div>


</fieldset>

