<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un modele de préparation') }}
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


                <form action="{{ route('modelePreparation.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-input placeholder="Conditionnement Logistique" id="idConditionnementLogistique" class="block mt-1 w-full" type="number"
                                    name="idConditionnementLogistique" value="{{old('idConditionnementLogistique')}}" required />

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
