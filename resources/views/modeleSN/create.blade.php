<x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un modéle de S\N') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('modeleSN.index')}}">Modéles de S\N</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('modeleSN.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="idArticle" value="{{ __('Article') }}" />
                                    <select name="idArticle"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($articles as $article)
                                        <option value="{{$article->id}}">{{$article->code}}</option> 
                                        @empty
                                          <option value="">vide</option>  
                                        @endforelse                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat" value="{{old('etat')}}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif">Actif</option>
                                        <option value="Inactif">Inactif</option>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Nb de n° S/N attendus " id="nbAttendus" class="block mt-1 w-full" type="number"
                                    name="nbAttendus" value="{{old('nbAttendus')}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Séquence de relevé " id="sequenceReleve" class="block mt-1 w-full" type="text"
                                    name="sequenceReleve" value="{{old('sequenceReleve')}}" required  />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Règle de souplesse" id="regleSouplesse" class="block mt-1 w-full" type="text"
                                    name="regleSouplesse" value="{{old('regleSouplesse')}}" required  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-label for="Libelle" value="{{ __('Libellé') }}" />
                                    <textarea class="form-control" id="Libelle" rows="6" type="textarea" name="Libelle"
                                        required>{{old('Libelle')}}</textarea>

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
                                class="fa fa-check"></i> Creer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
