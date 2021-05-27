<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une association') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('association.index')}}">Associations</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('association.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="idSociete" value="{{ __('Societé') }}" />
                                    <select name="idSociete"  class="form-select"
                                        aria-label="Default select example">
                                        <option  value="">Choisé le code de la societé </option>
                                        @forelse ($societes as $societe)
                                        <option value="{{$societe->id}}">{{$societe->id}}</option> 
                                        @empty
                                        <option value="">vide</option>    
                                        @endforelse
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                    <select name="type"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="maGistor">maGistor</option>
                                        <option value="Externe">Externe</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-input placeholder="Prestation" id="prestation" class="block mt-1 w-full" type="text"
                                        name="prestation" value="{{old('prestation')}}" required  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="N° compte de la société chez le transporteur" id="numCompte" class="block mt-1 w-full" type="text"
                                        name="numCompte" value="{{old('numCompte')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Plage colis : plage de numéros de colis imposée pour la société et le transporteur"
                                     id="plageColis" class="block mt-1 w-full" type="text"
                                        name="plageColis" value="{{old('plageColis')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code interne" id="codeInterne" class="block mt-1 w-full" type="text"
                                        name="codeInterne" value="{{old('codeInterne')}}" required  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="palettisation" type="checkbox" id="palettisation">
                                    <label class="form-check-label" for="palettisation">Palettisation obligatoire </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="echangeEDI" type="checkbox" id="echangeEDI">
                                    <label class="form-check-label" for="echangeEDI">Echange EDI</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="impressionCN23" type="checkbox" id="impressionCN23">
                                    <label class="form-check-label" for="impressionCN23">Impression CN23 (pour la douane)</label>
                                </div>
                            </div>
                               
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="transporteurParDefaut" type="checkbox" id="transporteurParDefaut">
                                    <label class="form-check-label" for="transporteurParDefaut">Transporteur par défaut </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="transporteurOptimiser" type="checkbox" id="transporteurOptimiser">
                                    <label class="form-check-label" for="transporteurOptimiser">Transporteur à optimiser</label>
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
