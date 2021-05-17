<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une famille de support') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('familleSupport.index')}}">Familles de support</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('familleSupport.store') }}" method="POST">
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
                                        <option value="Palette">Palette</option>
                                        <option value="Carton">Carton</option>
                                        <option value="Vrac">Vrac</option>
                                        <option value="Bac">Bac</option>
                                        <option value="Indéfini">Indéfini</option>
                                        <option value="Caisse">Caisse</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Unité de réception" id="uniteReception" class="block mt-1 w-full" type="text"
                                        name="uniteReception" value="{{old('uniteReception')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Unité de stockage" id="uniteStockage" class="block mt-1 w-full" type="text"
                                        name="uniteStockage" value="{{old('uniteStockage')}}" required  />
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Unité de préparation" id="unitePreparation" class="block mt-1 w-full" type="text"
                                        name="unitePreparation" value="{{old('unitePreparation')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Unité de expédition" id="uniteExpedition" class="block mt-1 w-full" type="text"
                                        name="uniteExpedition" value="{{old('uniteExpedition')}}" required  />
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-input placeholder="Unité de réapprovisionnement" id="uniteReapprovisionnement" class="block mt-1 w-full" type="text"
                                        name="uniteReapprovisionnement" value="{{old('uniteReapprovisionnement')}}" required  />
                                </div>
                            </div>        
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Profondeur" id="profondeur" class="block mt-1 w-full" type="flaot"
                                        name="profondeur" value="{{old('profondeur')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Hauteur" id="hauteur" class="block mt-1 w-full" type="flaot"
                                        name="hauteur" value="{{old('hauteur')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Largeur" id="largeur" class="block mt-1 w-full" type="flaot"
                                        name="largeur" value="{{old('largeur')}}" required  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Poids" id="poids" class="block mt-1 w-full" type="flaot"
                                        name="poids" value="{{old('poids')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Charge max" id="chargeMax" class="block mt-1 w-full" type="flaot"
                                        name="chargeMax" value="{{old('chargeMax')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Hauteur max" id="hauteurMax" class="block mt-1 w-full" type="flaot"
                                        name="hauteurMax" value="{{old('hauteurMax')}}" required  />
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
