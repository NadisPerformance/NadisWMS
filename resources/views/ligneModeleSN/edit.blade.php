<x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier de la ligne n° {{$emplacement->nombre}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('emplacement.index')}}">Lignes</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('ligneModeleSN.update', ['ligneModeleSN' => $ligneModeleSN->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">

                                    <x-jet-input placeholder="N° ligne" id="nombre" class="block mt-1 w-full" type="number"
                                        name="nombre" value="{{old('nombre', $ligneModeleSN->nombre)}}" required  />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="idFamilleSN" value="{{ __('Famille de S\N') }}" />
                                    <select name="idFamilleSN"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($familleSNs as $familleSN)
                                        <option value="{{$familleSN->id}}" 
                                             {{(old('idFamilleSN',$ligneModeleSN->idFamilleSN)==$familleSN->id)? 'selected':''}}>
                                             {{$familleSN->code}}
                                        </option> 
                                        @empty
                                          <option value="">Vide</option>
                                        @endforelse                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="idModeleSN" value="{{ __('Modéle de S\N') }}" />
                                    <select name="idModeleSN"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($modeleSNs as $modeleSN)
                                        <option value="{{$modeleSN->id}}" 
                                             {{(old('idModeleSN',$ligneModeleSN->idModeleSN)==$modeleSN->id)? 'selected':''}}>
                                             {{$modeleSN->id}}
                                        </option> 
                                        @empty
                                          <option value="">Vide</option>
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
