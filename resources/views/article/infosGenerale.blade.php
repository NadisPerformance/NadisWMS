<div class='form-control'  >
    <fieldset >
        <div class="modal-header">
            <h4 class="modal-title">Informations générales</h4>
        </div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Code d'article" id="codeArticle" class="block mt-1 w-full"
                    type="number" name="codeArticle" value="{{old('codeArticle',$article->codeArticle ?? null)}}" required  />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Societé Gestionnaire" id="steGestionnaire"
                    class="block mt-1 w-full" type="text" name="steGestionnaire"
                    value="{{old('steGestionnaire',$article->steGestionnaire ?? null)}}" required  />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-label for="etat" value="{{ __('Etat') }}" />
                <select name="etat" value="{{old('etat',$article->etat ?? null)}}" class="form-select"
                    aria-label="Default select example">
                    <option value="Créer">Créer</option>
                    <option value="Valide">Valide</option>
                    <option value="Invalide">Invalide</option>
                    <option value="A supprimer">A supprimer</option>
                </select>
            </div>
        </div>


    </div>
    

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Reference Fournisseur " id="referenceFournisseur"
                    class="block mt-1 w-full" type="number" name="referenceFournisseur"
                    value="{{old('referenceFournisseur',$article->referenceFournisseur ?? null)}}" required  />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Reference N3 " id="referenceN3" class="block mt-1 w-full"
                    type="number" name="referenceN3" value="{{old('referenceN3',$article->referenceN3 ?? null)}}" required  />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-label for="lectureCodeBarre" value="{{ __('Lecture code de Barre') }}" />
                <select  name="lectureCodeBarre" value="{{old('lectureCodeBarre',$article->lectureCodeBarre ?? null)}}" class="form-select"
                    aria-label="Default select example">
                    <option value="Oui">Oui</option>
                    <option value="Oui sauf si référence unique à l’emplacement">Oui sauf si
                        référence
                        unique à l’emplacement</option>
                    <option value="Non">Non</option>
                </select>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Date Contrat" id="dateContrat"
                    class="block mt-1 w-full" type="date" name="dateContrat"
                    value="{{old('dateContrat',$article->dateContrat ?? null)}}" required  />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Fenêtre(jour)" id="gestionFenetre" class="block mt-1 w-full"
                    type="number" name="gestionFenetre" value="{{old('gestionFenetre',$article->gestionFenetre ?? null)}}" required  />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-label for="rotation" value="{{ __('Rotation') }}" />
                <select  name="rotation" value="{{old('rotation',$article->rotation ?? null)}}" class="form-select"
                    aria-label="Default select example">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Unité" id="unite" class="block mt-1 w-full"
                    type="text" name="unite" value="{{old('unite',$article->unite ?? null)}}" required  />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Precision" id="precision" class="block mt-1 w-full"
                    type="number" name="precision" value="{{old('precision',$article->precision ?? null)}}" required />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Quantité" id="qtes" class="block mt-1 w-full" type="number"
                    name="qtes" value="{{old('qtes',$article->qtes ?? null)}}" required  />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Qualité" id="qualite"
                    class="block mt-1 w-full" type="text" name="qualite"
                    value="{{old('qualite',$article->qualite ?? null)}}" required  />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="Racine" id="racine" class="block mt-1 w-full"
                    type="text" name="racine" value="{{old('racine',$article->racine ?? null)}}" required  />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-input placeholder="PCB(Par combien ?)" id="PCB" class="block mt-1 w-full" type="text"
                    name="PCB" value="{{old('PCB',$article->PCB ?? null)}}" required  />
            </div>
           
            
        </div>

        
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <x-jet-label for="instructions" value="{{ __('Instructions') }}" />
                <textarea  class="form-control" id="instructions" rows="12"
                    type="textarea" name="instructions" value="{{old('instructions',$article->instructions ?? null)}}" required >
                  </textarea>
        </div>
    </div>

    
</div>
    <div class='form-control'  style='margin-top: -300px; margin-left:34%; height: 300px;width: 790px;font-size:15px'>
    <fieldset >
        <div class="modal-header">
            <h4 class="modal-title">Libelle</h4>
        </div>
        
       <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <x-jet-input placeholder="Libelle" id="libelle"
                        class="block mt-1 w-full" type="text" name="libelle"
                        value="{{old('libelle',$article->libelle ?? null)}}" required  />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <x-jet-input placeholder="Libelle Court" id="libelleCourt" class="block mt-1 w-full"
                        type="text" name="libelleCourt" value="{{old('libelleCourt',$article->libelleCourt ?? null)}}" required  />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <x-jet-label for="libelleLong" value="{{ __('Libelle Long') }}" />
                    <textarea class="form-control" id="libelleLong" rows="5" type="textarea" name="libelleLong"
                    value="{{old('libelleLong',$article->libelleLong  ?? null)}}" required></textarea>
                </div>
            </div>
        </div>
    </fieldset>
</div>
</div>


</fieldset>
</div>