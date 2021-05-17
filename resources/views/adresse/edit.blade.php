<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'adresse de livraison {{$adresse->livraison}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('adresse.index')}}">Adresse</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('adresse.update', ['adresse' => $adresse->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Livraison" id="livraison" class="block mt-1 w-full" type="text"
                                        name="livraison" value="{{old('livraison',$adresse->livraison)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Siege" id="siege" class="block mt-1 w-full" type="text"
                                        name="siege" value="{{old('siege',$adresse->siege)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Facturation"
                                     id="facturation" class="block mt-1 w-full" type="text"
                                        name="facturation" value="{{old('facturation',$adresse->facturation)}}" required  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="CP" id="CP" class="block mt-1 w-full" type="text"
                                        name="CP" value="{{old('CP',$adresse->CP)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Ville" id="Ville" class="block mt-1 w-full" type="text"
                                        name="Ville" value="{{old('Ville',$adresse->Ville)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Pays" id="pays" class="block mt-1 w-full" type="text"
                                        name="pays" value="{{old('pays',$adresse->pays)}}" required  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Raison sociale" id="raisonSociale" class="block mt-1 w-full" type="text"
                                        name="raisonSociale" value="{{old('raisonSociale',$adresse->raisonSociale)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Site internet" id="siteInternet" class="block mt-1 w-full" type="text"
                                        name="siteInternet" value="{{old('siteInternet',$adresse->siteInternet)}}" required  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="idSite" value="{{ __('Site') }}" />
                                    <select name="idSite"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($sites as $site)
                                        <option value="{{$site->id}}"
                                            {{(old('idSite',$adresse->idSite)==$site->id)? 'selected':''}}>
                                            {{$site->code}}
                                        </option> 
                                        @empty
                                          vide  
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="idUser" value="{{ __('Personne référent') }}" />
                                    <select name="idUser"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($users as $user)
                                        <option value="{{$user->id}}"
                                            {{(old('idUser',$adresse->idUser)==$user->id)? 'selected':''}}>
                                            {{$user->name}}
                                        </option> 
                                        @empty
                                          vide  
                                        @endforelse                                    
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
                                class="fa fa-check"></i> Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
