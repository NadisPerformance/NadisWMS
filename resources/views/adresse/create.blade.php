<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une adresse') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('adresse.index')}}">Adresse</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('adresse.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Livraison" id="livraison" class="block mt-1 w-full" type="text"
                                        name="livraison" value="{{old('livraison')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Siege" id="siege" class="block mt-1 w-full" type="text"
                                        name="siege" value="{{old('siege')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Facturation"
                                     id="facturation" class="block mt-1 w-full" type="text"
                                        name="facturation" value="{{old('facturation')}}" required  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="CP" id="CP" class="block mt-1 w-full" type="text"
                                        name="CP" value="{{old('CP')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Ville" id="Ville" class="block mt-1 w-full" type="text"
                                        name="Ville" value="{{old('Ville')}}" required  />
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Raison sociale" id="raisonSociale" class="block mt-1 w-full" type="text"
                                        name="raisonSociale" value="{{old('raisonSociale')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Site internet" id="siteInternet" class="block mt-1 w-full" type="text"
                                        name="siteInternet" value="{{old('siteInternet')}}" required  />
                                </div>
                            </div>
                          
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="idUser"  class="form-select"
                                        aria-label="Default select example">
                                        <option  value=null>Personne référent</option>
                                        @forelse ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option> 
                                        @empty
                                          vide  
                                        @endforelse                                    
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="type"  class="form-select"
                                        aria-label="Default select example" id="type" onchange="Affiche(this,'site','fournisseur','client')">
                                        <option  value=null>Type</option>
                                        <option  value="Forcé à « site »">Forcé à « site »</option>
                                        <option value="Forcé à « fournisseur »">Forcé à « fournisseur »</option>
                                        <option value="Forcé à « client »">Forcé à « client »</option>
                                    </select>
                                </div>
                                
                               
                                
                                
                            </div>
                            
                        </div>
                        <div style="display: none" id="fournisseur">
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-label for="idFournisseur" value="{{ __('Fournisseurs') }}" />
                                    <select name="idFournisseur"  class="form-select"
                                        aria-label="Default select example">
                                        <option  value="">Choisé code du fournisseur </option>
                                        @forelse ($fournisseurs as $fournisseur)
                                        <option value="{{$fournisseur->id}}">{{$fournisseur->code}}</option> 
                                        @empty
                                        <option value="">vide</option>    
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="display: none" id="client">
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-label for="idClient" value="{{ __('Clients') }}" />
                                    <select name="idClient"  class="form-select"
                                        aria-label="Default select example">
                                        <option  value="">Choisé code du client </option>
                                        @forelse ($clients as $client)
                                        <option value="{{$client->id}}">{{$client->code}}</option> 
                                        @empty
                                          <option value="">vide</option>  
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="display: none" id="site">
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-label for="idSite" value="{{ __('Site') }}" />
                                    <select name="idSite"  class="form-select"
                                        aria-label="Default select example">
                                        <option  value="">Choisé code du site </option>
                                        @forelse ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->code}}</option> 
                                        @empty
                                        <option value="">vide</option>    
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
                                class="fa fa-check"></i> Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
     function Affiche(element,attr1,attr2,attr3)
{
    if(element.value == 'Forcé à « site »'){
        document.getElementById(attr2).style.display ='none';
        document.getElementById(attr3).style.display ='none';
        document.getElementById(attr1).style.display ='block';
    }else if(element.value == 'Forcé à « fournisseur »'){
        document.getElementById(attr1).style.display ='none';
        document.getElementById(attr3).style.display ='none';
        document.getElementById(attr2).style.display ='block';
    }else if(element.value == 'Forcé à « client »'){
        document.getElementById(attr1).style.display ='none';
        document.getElementById(attr3).style.display ='block';
        document.getElementById(attr2).style.display ='none';
    }else{
        document.getElementById(attr1).style.display ='none';
        document.getElementById(attr3).style.display ='none';
        document.getElementById(attr2).style.display ='none';
    }
}

    </script>
</x-app-layout>
