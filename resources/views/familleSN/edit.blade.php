<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une familleSN') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('familleSN.update', ['familleSN' => $familleSN->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{old('code',$familleSN->code)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Longueur" id="longueur" class="block mt-1 w-full" type="number"
                                        name="longueur" value="{{old('longueur',$familleSN->longueur)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Taille maxi" id="tailleMax" class="block mt-1 w-full" type="number"
                                        name="tailleMax" value="{{old('tailleMax',$familleSN->tailleMax)}}" required  />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                    <select name="type" value="{{old('type',$familleSN->type)}}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="typeCaractere" value="{{ __('Type Caractére') }}" />
                                    <select name="typeCaractere" value="{{old('typeCaractere',$familleSN->typeCaractere)}}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="typeCheckdigit" value="{{ __('Type Check digit') }}" />
                                    <select name="typeCheckdigit" value="{{old('typeCheckdigit',$familleSN->typeCheckdigit)}}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Numérique" id="numerique" class="block mt-1 w-full" type="number"
                                        name="numerique" value="{{old('numerique',$familleSN->numerique)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Alphanumérique" id="alphanumerique" class="block mt-1 w-full" type="number"
                                        name="alphanumerique" value="{{old('alphanumerique',$familleSN->alphanumerique)}}" required  />
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Préfixe" id="prefixe" class="block mt-1 w-full" type="number"
                                        name="prefixe" value="{{old('prefixe',$familleSN->prefixe)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Suffixe" id="suffixe" class="block mt-1 w-full" type="number"
                                        name="suffixe" value="{{old('suffixe',$familleSN->suffixe)}}" required  />
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-check form-switch">
                                    <input value=1 @if(old('enEtat',$familleSN->fixe ?? null)==1) checked @endif class="form-check-input" name="fixe" type="checkbox" id="fixe">
                                    <label class="form-check-label" for="fixe">Fixe</label>
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
