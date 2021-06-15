<x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le groupe  {{$groupe->Libelle}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('groupe.index')}}">Groupes</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>

    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('groupe.update', ['groupe' => $groupe->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Libellé" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle',$groupe->Libelle)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{old('code',$groupe->code)}}" required  />
                                </div>
                            </div>
                            
                        </div>    

                        <div class="row">
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat" value="{{old('etat')}}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif"{{(old('etat',$groupe->etat)=='Actif')? 'selected':''}}>Actif</option>
                                        <option value="Inactif"{{(old('etat',$groupe->etat)=='Inactif')? 'selected':''}}>Inactif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="idUser" value="{{ __('Users') }}" />
                                    <select name="idUser"  class="form-select"
                                        aria-label="Default select example">
                                        <option  value="">Choisé l'utilisateur' </option>
                                        @forelse ($users as $user)
                                        <option value="{{$user->id}}"
                                            {{(old('idUser',$groupe->idUser)==$user->id)? 'selected':''}}>
                                            {{$user->name}}
                                        </option> 
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
                                class="fa fa-check"></i> Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
