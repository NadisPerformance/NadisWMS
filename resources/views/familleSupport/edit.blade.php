<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier la famille de support du code {{$familleSupport->code}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('familleSupport.index')}}">Familles de support</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('familleSupport.update', ['familleSupport' => $familleSupport->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{old('code',$familleSupport->code)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Libellé" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle',$familleSupport->Libelle)}}" required  />
                                </div>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif"{{(old('etat',$familleSupport->etat)=='Actif')? 'selected':''}}>Actif</option>
                                        <option value="Inactif"{{(old('etat',$familleSupport->etat)=='Inactif')? 'selected':''}}>Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                    <select name="type"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Palette"{{(old('type',$familleSupport->type)=='Palette')? 'selected':''}}>Palette</option>
                                        <option value="Carton"{{(old('type',$familleSupport->type)=='Carton')? 'selected':''}}>Carton</option>
                                        <option value="Vrac"{{(old('type',$familleSupport->type)=='Vrac')? 'selected':''}}>Vrac</option>
                                        <option value="Bac"{{(old('type',$familleSupport->type)=='Bac')? 'selected':''}}>Bac</option>
                                        <option value="Indéfini"{{(old('type',$familleSupport->type)=='Indéfini')? 'selected':''}}>Indéfini</option>
                                        <option value="Caisse"{{(old('type',$familleSupport->type)=='Caisse')? 'selected':''}}>Caisse</option>
                                         </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Unité de réception" id="uniteReception" class="block mt-1 w-full" type="text"
                                        name="uniteReception" value="{{old('uniteReception',$familleSupport->uniteReception)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Unité de stockage" id="uniteStockage" class="block mt-1 w-full" type="text"
                                        name="uniteStockage" value="{{old('uniteStockage',$familleSupport->uniteStockage)}}" required  />
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Unité de préparation" id="unitePreparation" class="block mt-1 w-full" type="text"
                                        name="unitePreparation" value="{{old('unitePreparation',$familleSupport->unitePreparation)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Unité de expédition" id="uniteExpedition" class="block mt-1 w-full" type="text"
                                        name="uniteExpedition" value="{{old('uniteExpedition',$familleSupport->uniteExpedition)}}" required  />
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-input placeholder="Unité de réapprovisionnement" id="uniteReapprovisionnement" class="block mt-1 w-full" type="text"
                                        name="uniteReapprovisionnement" value="{{old('uniteReapprovisionnement',$familleSupport->type)}}" required  />
                                </div>
                            </div>        
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Profondeur" id="profondeur" class="block mt-1 w-full" type="flaot"
                                        name="profondeur" value="{{old('profondeur',$familleSupport->profondeur)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Hauteur" id="hauteur" class="block mt-1 w-full" type="flaot"
                                        name="hauteur" value="{{old('hauteur',$familleSupport->hauteur)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Largeur" id="largeur" class="block mt-1 w-full" type="flaot"
                                        name="largeur" value="{{old('largeur',$familleSupport->largeur)}}" required  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Poids" id="poids" class="block mt-1 w-full" type="flaot"
                                        name="poids" value="{{old('poids',$familleSupport->poids)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Charge max" id="chargeMax" class="block mt-1 w-full" type="flaot"
                                        name="chargeMax" value="{{old('chargeMax',$familleSupport->chargeMax)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Hauteur max" id="hauteurMax" class="block mt-1 w-full" type="flaot"
                                        name="hauteurMax" value="{{old('hauteurMax',$familleSupport->hauteurMax)}}" required  />
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
