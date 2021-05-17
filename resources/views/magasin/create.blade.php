<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une magasin') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  

    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('magasin.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{old('code')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Libellé" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle')}}" required  />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat" value="{{old('etat')}}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="Ouvert">Ouvert</option>
                                        <option value="Fermé">Fermé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                    <select name="type" value="{{old('type')}}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="Réception">Réception</option>
                                        <option value="Débord">Débord</option>
                                        <option value="Stockage">Stockage</option>
                                        <option value="Facing">Facing</option>
                                        <option value="Lancement">Lancement</option>
                                        <option value="Prélèvement">Prélèvement</option>
                                        <option value="Préparation">Préparation</option>
                                        <option value="Contrôle">Contrôle</option>
                                        <option value="Expédition">Expédition</option>
                                        <option value="Destruction">Destruction</option>
                                        <option value="Transit">Transit</option>
                                        <option value="Entrée">Entrée</option>
                                        <option value="Sortie">Sortie</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Nombre des meubles" id="nombreMeubles" class="block mt-1 w-full" type="number"
                                        name="nombreMeubles" value="{{old('nombreMeubles')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Nombre des colonnes" id="nombreColonnes" class="block mt-1 w-full" type="number"
                                        name="nombreColonnes" value="{{old('nombreColonnes')}}" required  />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Nombre des niveaux" id="nombreNiveaux" class="block mt-1 w-full" type="number"
                                        name="nombreNiveaux" value="{{old('nombreNiveaux')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Nombre des indices" id="nombreIndices" class="block mt-1 w-full" type="number"
                                        name="nombreIndices" value="{{old('nombreIndices')}}" required  />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Séparateur" id="separateur" class="block mt-1 w-full" type="number"
                                        name="separateur" value="{{old('separateur')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Site?" id="idSite" class="block mt-1 w-full" type="number"
                                        name="idSite" value="{{old('idSite')}}" required  />
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
                                class="fa fa-check"></i> Creer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
