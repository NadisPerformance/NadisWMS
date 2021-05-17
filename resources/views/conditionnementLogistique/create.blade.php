<x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un conditionnement logistique') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('conditionnementLogistique.index')}}">Conditionnements logistiques</a></li>
            <li class="breadcrumb-item active">Création</li>
          </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('conditionnementLogistique.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{ old('code') }}" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('Etat') }}" />
                                    <select name="etat" value="{{ old('etat') }}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif">Actif</option>
                                        <option value="Inactif">Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                    <select name="type" value="{{ old('type') }}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="Unité">Unité</option>
                                        <option value="Colis">Colis</option>
                                        <option value="Couche">Couche</option>
                                        <option value="Palette">Palette</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Borne mini "
                                        id="borneMin" class="block mt-1 w-full" type="number" name="borneMin"
                                        value="{{ old('borneMin') }}" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Borne maxi" id="borneMax" class="block mt-1 w-full" type="number"
                                        name="borneMax" value="{{ old('borneMax') }}" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Poids" id="poids" class="block mt-1 w-full" type="number"
                                        name="poids" value="{{ old('poids') }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Longueur" id="longueur" class="block mt-1 w-full"
                                        type="number" name="longueur" value="{{ old('longueur') }}" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Largeur" id="largeur" class="block mt-1 w-full"
                                        type="number" name="largeur" value="{{ old('largeur') }}" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Profondeur" id="profondeur" class="block mt-1 w-full"
                                        type="number" name="profondeur" value="{{ old('profondeur') }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Filiation" id="filiation" class="block mt-1 w-full"
                                        type="text" name="filiation" value="{{ old('filiation') }}" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="typeFiliation" value="{{ __('Type de filiation') }}" />
                                    <select name="typeFiliation" value="{{ old('typeFiliation') }}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Plan de palettisation" id="planPalettisation"
                                        class="block mt-1 w-full" type="text" name="planPalettisation"
                                        value="{{ old('planPalettisation') }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Coefficient" id="coefficient" class="block mt-1 w-full"
                                        type="number" name="coefficient" value="{{ old('coefficient') }}" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Quantité de l’article présente sous ce conditionnement"
                                        id="qte" class="block mt-1 w-full" type="number" name="qte"
                                        value="{{ old('qte') }}" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="idArticle" value="{{ __('Article') }}" />
                                    <select name="idArticle"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($articles as $article)
                                        <option value="{{$article->id}}">{{$article->codeArticle}}</option> 
                                        @empty
                                        <option >vide</option>   
                                        @endforelse                                      
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="UniteReception" type="checkbox"
                                        id="UniteReception">
                                    <label class="form-check-label" for="UniteReception">Unite de reception </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="UnitePreparation" type="checkbox"
                                        id="UnitePreparation">
                                    <label class="form-check-label" for="UnitePreparation">Unite de preparation</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="UniteStockage" type="checkbox"
                                        id="UniteStockage">
                                    <label class="form-check-label" for="UniteStockage">Unite de stockage</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="gerbage" type="checkbox" id="gerbage">
                                    <label class="form-check-label" for="gerbage">Gerbage</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 class="form-check-input" name="enEtat" type="checkbox" id="enEtat">
                                    <label class="form-check-label" for="enEtat">En l'état</label>
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
