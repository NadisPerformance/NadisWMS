<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un plan de transport') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('planTransport.index')}}">Plans des transports</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('planTransport.store') }}" method="POST">
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
                                    <x-jet-input placeholder="Libellé du plan de transport" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Pays" id="pays" class="block mt-1 w-full" type="text"
                                        name="pays" value="{{old('pays')}}" required  />
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
                                        <option value="Affrètement">Affrètement</option>
                                        <option value="Messagerie">Messagerie</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="idTransporteur" value="{{ __('Transporteur') }}" />
                                    <select name="idTransporteur"  class="form-select"
                                        aria-label="Default select example">
                                        <option  value="">Choisé le code du transporteur </option>
                                        @forelse ($transporteurs as $transporteur)
                                        <option value="{{$transporteur->id}}">{{$transporteur->code}}</option> 
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
                                    <x-jet-input placeholder="Taxe gazole" id="taxeGazole" class="block mt-1 w-full" type="number"
                                        name="taxeGazole" value="{{old('taxeGazole')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Taxe sureté" id="taxeSurete" class="block mt-1 w-full" type="number"
                                        name="taxeSurete" value="{{old('taxeSurete')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="L’écotaxe " id="ecotaxe" class="block mt-1 w-full" type="number"
                                        name="ecotaxe" value="{{old('ecotaxe')}}" required  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="modeRecherche" value="{{ __('Mode de recherche') }}" />
                                    <select name="modeRecherche"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Par pays">Par pays</option>
                                        <option value="Par département">Par département</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="modeCalcul" value="{{ __('Mode de calcul du montant de transport') }}" />
                                    <select name="modeCalcul"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Au poids">Au poids</option>
                                        <option value="Au nombre de colis">Au nombre de colis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="dateDebutValidite" value="{{ __('Date de début de validité') }}" />
                                    <x-jet-input  id="dateDebutValidite" class="block mt-1 w-full" type="date"
                                        name="dateDebutValidite" value="{{old('dateDebutValidite')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="dateFinValidite" value="{{ __('Date de fin de validité') }}" />
                                    <x-jet-input placeholder="Dates de fin de validité" id="dateFinValidite" class="block mt-1 w-full" type="date"
                                        name="dateFinValidite" value="{{old('dateFinValidite')}}" required  />
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
