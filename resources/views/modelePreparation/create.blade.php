<x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un modele de préparation') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('modelePreparation.index')}}">Modeles de préparation</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('modelePreparation.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-label for="idConditionnementLogistique" value="{{ __('Conditionnement logistique') }}" />
                                    <select name="idConditionnementLogistique"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($conditionnementLogistiques as $conditionnementLogistique)
                                        <option value="{{$conditionnementLogistique->id}}">{{$conditionnementLogistique->code}}</option> 
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
                                class="fa fa-check"></i> Creer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
