<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des familles des articles') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        @if (session('msge'))
        <h3 style="color: red">
            {{ session()->get('msge') }}
        </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Familles</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionFamille') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('famille.create') }}">Ajouter</a>
                </button>
                <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                    onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
            </div>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($familles as $famille)
                        <tr>
                            <td><input type="checkbox" name="{{ $famille->id }}" value="{{ $famille->id }}"></td>
                            <td>{{ $famille->id }}</td>
                            <td>{{ $famille->name }}</td>
                            <td>
                                
                                <button title="Détails" >
                                    <a class="btn btn-primary " href="{{ route('famille.show', ['famille' => $famille->id]) }}">
                                      +
                                      </a>
                                </button>
    
                                <button  class="btn btn-warning ">
                                    
                                    <a title="Modifier la famille {{ $famille->name }}" href="{{ route('famille.edit', ['famille' => $famille->id]) }}">
                                        <i class="fa fa-edit"></i>Modifier
                                    </a>
            
                                </button>
                                <form style="display: inline;"></form>
                                <form style="display: inline;" action="{{ route('famille.destroy', ['famille' => $famille->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="input" name="submit" class="btn btn-danger" title="Supprimer la famille {{ $famille->name }}"
                                            onClick="return confirm('Suppriment la famille')">
                                            <i class="fa fa-trash"></i>Supprimer
                                        </button>
                                </form>
                                
                            </td>
                        </tr>
                    @empty
                        <p>Vide!</p>
                    @endforelse
                </tbody>


            </table>
        </form>
    </div>
</x-app-layout>
