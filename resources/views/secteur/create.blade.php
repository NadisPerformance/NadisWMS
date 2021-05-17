<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une secteur') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('secteur.index')}}">secteur</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('secteur.store') }}" method="POST">
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

                                    <x-jet-input placeholder="Libellé secteur" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle')}}" required  />
                                </div>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif">Actif</option>
                                        <option value="Inactif">Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                    <select name="type"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Préparation">Préparation</option>
                                        <option value="Mouvement d’entrée">Mouvement d’entrée</option>
                                        <option value="Mouvement de sortie">Mouvement de sortie</option>
                                    </select>
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
