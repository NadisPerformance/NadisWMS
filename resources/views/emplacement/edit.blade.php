<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'emplacement du code {{$emplacement->code}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('emplacement.index')}}">Emplacement</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('emplacement.update', ['emplacement' => $emplacement->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{old('code',$emplacement->code)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Libellé emplacement" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle',$emplacement->Libelle)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Libellé emplacement spécifique client" id="LibelleClient" class="block mt-1 w-full" type="text"
                                        name="LibelleClient" value="{{old('LibelleClient',$emplacement->LibelleClient)}}" required  />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif"{{(old('etat',$emplacement->etat)=='Actif')? 'selected':''}}>Actif</option>
                                        <option value="Inactif"{{(old('etat',$emplacement->etat)=='Inactif')? 'selected':''}}>Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                    <select name="type"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Accumulation finie"{{(old('type',$emplacement->type)=='Accumulation finie')? 'selected':''}}>Accumulation finie</option>
                                        <option value="Accumulation infinie"{{(old('type',$emplacement->type)=='Accumulation infinie')? 'selected':''}}>Accumulation infinie</option>
                                        <option value="Normal"{{(old('type',$emplacement->type)=='Normal')? 'selected':''}}>Normal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="usage" value="{{ __('Usage') }}" />
                                    <select name="usage"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Entrée uniquement"{{(old('usage',$emplacement->usage)=='Entrée uniquement')? 'selected':''}}>Entrée uniquement</option>
                                        <option value="Sortie uniquement"{{(old('usage',$emplacement->usage)=='Sortie uniquement')? 'selected':''}}>Sortie uniquement</option>
                                        <option value="Entrée et sortie"{{(old('usage',$emplacement->usage)=='Entrée et sortie')? 'selected':''}}>Entrée et sortie</option>
                                        <option value="Aucun"{{(old('usage',$emplacement->usage)=='Aucun')? 'selected':''}}>Aucun</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Capacité en nombre si accumulation finie"
                                     id="capacite" class="block mt-1 w-full" type="float"
                                        name="capacite" value="{{old('capacite',$emplacement->capacite)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Hauteur" id="hauteur" class="block mt-1 w-full" type="float"
                                        name="hauteur" value="{{old('hauteur',$emplacement->hauteur)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Largeur" id="largeur" class="block mt-1 w-full" type="float"
                                        name="largeur" value="{{old('largeur',$emplacement->largeur)}}" required  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Profondeur" id="profondeur" class="block mt-1 w-full" type="float"
                                        name="profondeur" value="{{old('profondeur',$emplacement->profondeur)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Poids" id="poids" class="block mt-1 w-full" type="float"
                                        name="poids" value="{{old('poids',$emplacement->poids)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Volume" id="volume" class="block mt-1 w-full" type="float"
                                        name="volume" value="{{old('volume',$emplacement->volume)}}" required  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="idMagasin" value="{{ __('Magasin') }}" />
                                    <select name="idMagasin"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($magasins as $magasin)
                                        <option value="{{$magasin->id}}"
                                            {{(old('idMagasin',$emplacement->idMagasin)==$magasin->id)? 'selected':''}}>
                                            {{$magasin->code}}
                                        </option> 
                                        @empty
                                          vide  
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="idSecteur" value="{{ __('Secteur') }}" />
                                    <select name="idSecteur"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($secteurs as $secteur)
                                        <option value="{{$secteur->id}}"
                                            {{(old('idSecteur',$emplacement->idSecteur)==$secteur->id)? 'selected':''}}>
                                            {{$secteur->code}}
                                        </option> 
                                        @empty
                                          vide  
                                        @endforelse                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="idFamilleSupport" value="{{ __('Famille Support') }}" />
                                    <select name="idFamilleSupport"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($familleSupports as $familleSupport)
                                        <option value="{{$familleSupport->id}}" 
                                             {{(old('idFamilleSupport',$emplacement->idFamilleSupport)==$familleSupport->id)? 'selected':''}}>
                                             {{$familleSupport->code}}
                                        </option> 
                                        @empty
                                          <option value="">Vide</option>
                                        @endforelse                                      
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <x-jet-label for="idArticle" value="{{ __('Article') }}" />
                                    <select name="idArticle"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($articles as $article)
                                        <option value="{{$article->id}}"
                                            {{(old('idArticle',$emplacement->idArticle)==$article->id)? 'selected':''}}>
                                            {{$article->codeArticle}}
                                        </option> 
                                        @empty
                                          vide  
                                        @endforelse                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch" style="margin-left:20%;margin-top: 10%">
                                    <input value=1 @if(old('estPicking',$emplacement->estPicking ?? null)==1) checked @endif 
                                    class="form-check-input" name="estPicking" type="checkbox" 
                                    id="estPicking">
                                    <label class="form-check-label" for="estPicking">Est picking ?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $err)

                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    @endif



                    <div class="modal-footer">
                        <input type="hidden" name="isEmpty" value="">
                        <button type="input" name="submit" value="newAccount" class="btn btn-success btn-icon"><i
                                class="fa fa-check"></i> Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
