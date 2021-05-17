<x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une ligne') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('ligneModeleSN.index')}}">Lignes</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('ligneModeleSN.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">

                                    <x-jet-input placeholder="N° ligne" id="nombre" class="block mt-1 w-full" type="number"
                                        name="nombre" value="{{old('nombre')}}" required  />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="idFamilleSN" value="{{ __('Famille de SN') }}" />
                                    <select name="idFamilleSN"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($familleSNs as $familleSN)
                                        <option value="{{$familleSN->id}}">{{$familleSN->code}}</option> 
                                        @empty
                                          <option value="">vide</option>  
                                        @endforelse                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="idModeleSN" value="{{ __('Modele de SN') }}" />
                                    <select name="idModeleSN"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($modeleSNs as $modeleSN)
                                        <option value="{{$modeleSN->id}}">{{$modeleSN->id}}</option> 
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
                                class="fa fa-check"></i> Creer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
