<x-app-layout>

    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification de modele de stockage d'id : {{$modeleStockage->id}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('modeleStockage.index')}}">Modéles de stockage</a></li>
            <li class="breadcrumb-item active">Modification</li>
          </ol>

    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('modeleStockage.update', ['modeleStockage' => $modeleStockage->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-jet-input placeholder="Nom" id="name" class="block mt-1 w-full" type="text"
                                         :value="old('name')"  />
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
