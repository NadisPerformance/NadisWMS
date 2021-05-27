<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le client du code  {{$client->code}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('client.index')}}">Clients</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('client.update', ['client' => $client->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{old('code',$client->code)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Libellé secteur" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle',$client->Libelle)}}" required  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif"{{(old('etat',$client->etat)=='Actif')? 'selected':''}}>Actif</option>
                                        <option value="Inactif"{{(old('etat',$client->etat)=='Inactif')? 'selected':''}}>Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                    <select name="type"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Client"{{(old('type',$client->type)=='Client')? 'selected':''}}>Client</option>
                                        <option value="Intersite"{{(old('type',$client->type)=='Intersite')? 'selected':''}}>Intersite</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code langue doc" id="codeLangueDoc" class="block mt-1 w-full" type="number"
                                        name="codeLangueDoc" value="{{old('codeLangueDoc',$client->codeLangueDoc)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code langue data" id="codeLangueData" class="block mt-1 w-full" type="number"
                                        name="codeLangueData" value="{{old('codeLangueData',$client->codeLangueData)}}" required  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="N° SIRET" id="numSiret" class="block mt-1 w-full" type="number"
                                        name="numSiret" value="{{old('numSiret',$client->numSiret)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Contrat date" id="contraDate" class="block mt-1 w-full" type="number"
                                        name="contraDate" value="{{old('contraDate',$client->contraDate)}}" required  />
                                </div>
                            </div>
                          
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Expédition partielle" id="expeditionPartielle" class="block mt-1 w-full" type="text"
                                        name="expeditionPartielle" value="{{old('expeditionPartielle',$client->expeditionPartielle)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Regroupement logique" id="regroupementLogique" class="block mt-1 w-full" type="text"
                                        name="regroupementLogique" value="{{old('regroupementLogique',$client->regroupementLogique)}}" required  />
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
