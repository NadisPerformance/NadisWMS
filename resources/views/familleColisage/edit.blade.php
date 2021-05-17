<x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification de la famille de colisage {{$familleColisage->name}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('familleColisage.index')}}">Familles de colisage</a></li>
            <li class="breadcrumb-item active">Modification</li>
          </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('familleColisage.update', ['familleColisage' => $familleColisage->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Nom" id="name" class="block mt-1 w-full" type="text"
                                        name="name" value="{{$familleColisage->name}}" required  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{$familleColisage->code}}" required  />
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat" value="{{$familleColisage->etat}}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif">Actif</option>
                                        <option value="Inactif">Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                    <select name="type" value="{{$familleColisage->type}}" class="form-select"
                                        aria-label="Default select example">
                                        <option value="Primaire">Primaire</option>
                                        <option value="Secondaire">Secondaire</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-label for="Libelle" value="{{ __('Libellé') }}" />
                                    <textarea class="form-control" id="Libelle" rows="8" type="textarea" name="Libelle"
                                    required>"{{old('Libelle',$familleColisage->Libelle)}}" </textarea>
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
