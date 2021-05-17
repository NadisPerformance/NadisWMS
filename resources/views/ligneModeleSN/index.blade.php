<x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des lignes Modélisations des S\N') }}
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
            <li class="breadcrumb-item active">Lignes</li>
        </ol> 
    <div class="container">
        <form action="{{ route('actionLigne') }}" method="GET">
            @csrf
            <button>
                <a class="btn btn-success btn-icon " href="{{ route('ligneModeleSN.create') }}">Ajouter</a>
            </button>
            <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>ID</th>
                        <th>N° ligne</th>
                        <th>Actions</th>
        

                    </tr>
                </thead>

                <tbody>
                    @forelse ($ligneModeleSNs as $ligneModeleSN)
                        <tr>
                            <td><input type="checkbox" name="{{ $ligneModeleSN->id }}" value="{{ $ligneModeleSN->id }}"></td>
                            <td>{{ $ligneModeleSN->id }}</td>
                            <td>{{ $ligneModeleSN->nombre }}</td>
                            <td>
                                
                                <button title="Détails" >
                                    <a class="btn btn-primary " href="{{ route('ligneModeleSN.show', ['ligneModeleSN' => $ligneModeleSN->id]) }}">
                                      +
                                      </a>
                                </button>

                                <button  class="btn btn-warning ">
                                    
                                    <a title="Modifier la ligne n° {{ $ligneModeleSN->nombre }}" href="{{ route('ligneModeleSN.edit', ['ligneModeleSN' => $ligneModeleSN->id]) }}">
                                        <i class="fa fa-edit"></i>Modifier
                                    </a>
            
                                </button>
                                <form style="display: inline;"></form>
                                <form style="display: inline;" action="{{ route('ligneModeleSN.destroy', ['ligneModeleSN' => $ligneModeleSN->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="input" name="submit" class="btn btn-danger" title="Supprimer la ligne n° {{ $ligneModeleSN->nombre }}"
                                            onClick="return confirm('Supprimer la ligne? ')">
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
