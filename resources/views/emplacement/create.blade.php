<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une emplacement') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('emplacement.index')}}">Emplacement</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('emplacement.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{old('code')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Libellé emplacement" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Libellé emplacement spécifique client" id="LibelleClient" class="block mt-1 w-full" type="text"
                                        name="LibelleClient" value="{{old('LibelleClient')}}" required  />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif">Actif</option>
                                        <option value="Inactif">Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                    <select name="type"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Accumulation finie">Accumulation finie</option>
                                        <option value="Accumulation infinie">Accumulation infinie</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="usage" value="{{ __('Usage') }}" />
                                    <select name="usage"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Entrée uniquement">Entrée uniquement</option>
                                        <option value="Sortie uniquement">Sortie uniquement</option>
                                        <option value="Entrée et sortie">Entrée et sortie</option>
                                        <option value="Aucun">Aucun</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Capacité en nombre si accumulation finie"
                                     id="capacite" class="block mt-1 w-full" type="float"
                                        name="capacite" value="{{old('capacite')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Hauteur" id="hauteur" class="block mt-1 w-full" type="float"
                                        name="hauteur" value="{{old('hauteur')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Largeur" id="largeur" class="block mt-1 w-full" type="float"
                                        name="largeur" value="{{old('largeur')}}" required  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Profondeur" id="profondeur" class="block mt-1 w-full" type="float"
                                        name="profondeur" value="{{old('profondeur')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Poids" id="poids" class="block mt-1 w-full" type="float"
                                        name="poids" value="{{old('poids')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Volume" id="volume" class="block mt-1 w-full" type="float"
                                        name="volume" value="{{old('volume')}}" required  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="idMagasin" value="{{ __('Magasin') }}" />
                                    <select name="idMagasin"  class="form-select"
                                        aria-label="Default select example">
                                        @if ($id!=0)
                                        <option value="{{$id}}">Magasin d'id : {{$id}}</option> 
                                        @else
                                        @forelse ($magasins as $magasin)
                                        <option value="{{$magasin->id}}">{{$magasin->code}}</option> 
                                        @empty
                                          vide  
                                        @endforelse
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="idSecteur" value="{{ __('Secteur') }}" />
                                    <select name="idSecteur"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($secteurs as $secteur)
                                        <option value="{{$secteur->id}}">{{$secteur->code}}</option> 
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
                                        <option value="{{$familleSupport->id}}">{{$familleSupport->code}}</option> 
                                        @empty
                                          vide  
                                        @endforelse                                      
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="estPicking" type="checkbox" 
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
                                class="fa fa-check"></i> Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
