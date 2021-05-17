<x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le code à barre  {{$codeBarre->value}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('codeBarre.index')}}">Codes à barre</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('codeBarre.update', ['codeBarre' => $codeBarre->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-jet-input placeholder="Value" id="value" class="block mt-1 w-full" type="number"
                                        name="value" value="{{old('value',$codeBarre->value)}}" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-jet-label for="idConditionnementLogistique" value="{{ __('Famille Support') }}" />
                                    <select name="idConditionnementLogistique"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($conditionnementLogistiques as $conditionnementLogistique)
                                        <option value="{{$conditionnementLogistique->id}}" 
                                             {{(old('idConditionnementLogistique',$codeBarre->idConditionnementLogistique)==$conditionnementLogistique->id)? 'selected':''}}>
                                             {{$conditionnementLogistique->code}}
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
