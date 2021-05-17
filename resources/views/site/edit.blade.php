<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification du site du code : {{$site->code}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('site.index')}}">Sites</a></li>
            <li class="breadcrumb-item active">Modification</li>
          </ol>

    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('site.update', ['site' => $site->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{old('code',$site->code)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Libellé" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle',$site->Libelle)}}" required  />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat" value="{{old('etat',$site->etat)}}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif">Actif</option>
                                        <option value="Inactif">Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input value=1 @if(old('defaut',$site->defaut ?? null)==1) checked @endif  class="form-check-input" name="defaut" type="checkbox"
                                        id="defaut">
                                    <label class="form-check-label" for="defaut">Défaut</label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code langue document" id="codeLangueDocument" class="block mt-1 w-full" type="number"
                                        name="codeLangueDocument" value="{{old('codeLangueDocument',$site->codeLangueDocument)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code langue data" id="codeLangueData" class="block mt-1 w-full" type="number"
                                        name="codeLangueData" value="{{old('codeLangueData',$site->codeLangueData)}}" required  />
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
