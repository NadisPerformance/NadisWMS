<x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des familles de S\N') }}
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
            <li class="breadcrumb-item active">familles</li>
        </ol> 
    <div class="container">
        <form action="{{ route('actionFamilleSN') }}" method="GET">
            @csrf
            <button>
                <a class="btn btn-success btn-icon " href="{{ route('familleSN.create') }}">Ajouter</a>
            </button>
            <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Actions</th>
        

                    </tr>
                </thead>

                <tbody>
                    @forelse ($familleSNs as $familleSN)
                        <tr>
                            <td><input type="checkbox" name="{{ $familleSN->id }}" value="{{ $familleSN->id }}"></td>
                            <td>{{ $familleSN->id }}</td>
                            <td>{{ $familleSN->code }}</td>
                            <td>
                                
                                <button title="Détails" >
                                    <a class="btn btn-primary " href="{{ route('familleSN.show', ['familleSN' => $familleSN->id]) }}">
                                      +
                                      </a>
                                </button>

                                <button  class="btn btn-warning ">
                                    
                                    <a title="Modifier la famille du code {{ $familleSN->code }}" href="{{ route('familleSN.edit', ['familleSN' => $familleSN->id]) }}">
                                        <i class="fa fa-edit"></i>Modifier
                                    </a>
            
                                </button>
                                <form style="display: inline;"></form>
                                <form style="display: inline;" action="{{ route('familleSN.destroy', ['familleSN' => $familleSN->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="input" name="submit" class="btn btn-danger" title="Supprimer la famille du code {{ $familleSN->code }}"
                                            onClick="return confirm('Supprimer la famille?')">
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
