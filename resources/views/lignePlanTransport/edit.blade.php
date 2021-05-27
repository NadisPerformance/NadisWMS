<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification de la ligne de plan du transport du zone  '{{$lignePlanTransport->zone}}'
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('lignePlanTransport.index')}}">Lignes</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('lignePlanTransport.update', ['lignePlanTransport' => $lignePlanTransport->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code pays" id="codePaye" class="block mt-1 w-full" type="number"
                                        name="codePaye" value="{{old('codePaye',$lignePlanTransport->codePaye)}}"   />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code département" id="codeDepartement" class="block mt-1 w-full" type="number"
                                        name="codeDepartement" value="{{old('codeDepartement',$lignePlanTransport->codeDepartement)}}"   />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Zone" id="zone" class="block mt-1 w-full" type="text"
                                        name="zone" value="{{old('zone',$lignePlanTransport->zone)}}"   />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code postal" id="codePostal" class="block mt-1 w-full" type="number"
                                        name="codePostal" value="{{old('codePostal',$lignePlanTransport->codePostal)}}"   />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Poids mini " id="poidsMin" class="block mt-1 w-full" type="number"
                                        name="poidsMin" value="{{old('poidsMin',$lignePlanTransport->poidsMin)}}" required="darori"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Poids maxi" id="poidsMax" class="block mt-1 w-full" type="number"
                                        name="poidsMax" value="{{old('poidsMax',$lignePlanTransport->poidsMax)}}"  required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Nb colis mini" id="nbColisMin" class="block mt-1 w-full" type="number"
                                        name="nbColisMin" value="{{old('nbColisMin',$lignePlanTransport->nbColisMin)}}"  required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Nb colis maxi" id="nbColisMax" class="block mt-1 w-full" type="number"
                                        name="nbColisMax" value="{{old('nbColisMax',$lignePlanTransport->nbColisMax)}}" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Tarif" id="tarif" class="block mt-1 w-full" type="number"
                                        name="tarif" value="{{old('tarif',$lignePlanTransport->tarif)}}"  required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="idPlanTransporteur" value="{{ __('Plan de transport') }}" />
                                    <select name="idPlanTransporteur"  class="form-select"
                                        aria-label="Default select example">
                                        <option  value="">Choisé le code du transporteur </option>
                                        @forelse ($planTransports as $planTransport)
                                        <option value="{{$planTransport->id}}"
                                            {{(old('idPlanTransporteur',$lignePlanTransport->idPlanTransporteur)==$planTransport->id)? 'selected':''}}>
                                            {{$planTransport->code}}
                                        </option> 
                                        @empty
                                        <option value="">vide</option>    
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="modeCalcul" value="{{ __('Mode de calcul') }}" />
                                    <select name="modeCalcul"  class="form-select" onchange="Affiche(this,'proportionnel')"
                                        aria-label="Default select example">
                                        <option value="Tarif forfaitaire"{{(old('modeCalcul',$lignePlanTransport->modeCalcul)=='Tarif forfaitaire')? 'selected':''}}>Tarif forfaitaire</option>
                                        <option value="Tarif proportionnel"{{(old('modeCalcul',$lignePlanTransport->modeCalcul)=='Tarif proportionnel')? 'selected':''}}>Tarif proportionnel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="display: none" id="proportionnel">
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Unité de calcul" id="uniteCalcul" class="block mt-1 w-full" type="number"
                                        name="uniteCalcul" value="{{old('uniteCalcul',$lignePlanTransport->uniteCalcul)}}"  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Arrondi" id="arrondi" class="block mt-1 w-full" type="number"
                                        name="arrondi" value="{{old('arrondi',$lignePlanTransport->arrondi)}}" />
                                </div>
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
    <script>
        function Affiche(element,attr)
   {
       if(element.value == 'Tarif proportionnel'){
           document.getElementById(attr).style.display ='block';
       }else {
        document.getElementById(attr).style.display ='none';
       }
   }
   
       </script>

</x-app-layout>
