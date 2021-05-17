<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une contacte') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('contacte.index')}}">Contacte</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('contacte.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Responsable société" id="responsableSociete" class="block mt-1 w-full" type="text"
                                        name="responsableSociete" value="{{old('responsableSociete')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Chef d’équipe" id="chefEquipe" class="block mt-1 w-full" type="text"
                                        name="chefEquipe" value="{{old('chefEquipe')}}" required  />
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
                                        <option value="{{$site->id}}">{{$site->code}}</option> 
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
                                        <option value="{{$user->id}}">{{$user->name}}</option> 
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
                                class="fa fa-check"></i> Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
