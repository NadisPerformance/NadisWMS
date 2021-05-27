<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des associations Societé/Transporteur') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Associations</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionAssociation') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('association.create') }}">Ajouter</a>
                </button>
                <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                    onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
            </div>
            <table class="table table-bordered"  id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>ID</th>
                        <th>Prestation</th>
                        <th>Actions</th>
        

                    </tr>
                </thead>

                <tbody>
                    @forelse ($associations as $association)
                        <tr>
                            <td><input type="checkbox" name="{{ $association->id }}" value="{{ $association->id }}"></td>
                            <td>{{ $association->id }}</td>
                            <td>{{ $association->prestation }}</td>
                            <td>
                                
                                            <button title="Détails" >
                                                <a class="btn btn-primary " href="{{ route('association.show', ['association' => $association->id]) }}">
                                                  +
                                                  </a>
                                            </button>
                                                
                                            <a  class="btn btn-warning " title="Modifier l'association de prestation  {{ $association->prestation }}" href="{{ route('association.edit', ['association' => $association->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <form style="display: inline;"></form>
                                            <form style="display: inline;" action="{{ route('association.destroy', ['association' => $association->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="input" name="submit" class="btn btn-danger" title="Supprimer l'association de prestation  {{ $association->prestation }}"
                                                    onClick="return confirm('Supprimer l'association de prestation  {{ $association->prestation }}')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                        </form>
                                            
                            </td>
                        </tr>
                    @empty
                        <p style="background-color: rgb(63, 15, 236)">Aucun association disponible</p>
                    @endforelse
                </tbody>


            </table>
        </form>
    </div>

</x-app-layout>
