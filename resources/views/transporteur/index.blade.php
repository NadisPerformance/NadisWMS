<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des transporteurs') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Transporteurs</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionTransporteur') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('transporteur.create') }}">Ajouter</a>
                </button>
                <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                    onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
            </div>
            <table class="table table-bordered"  id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Actions</th>
        

                    </tr>
                </thead>

                <tbody>
                    @forelse ($transporteurs as $transporteur)
                        <tr>
                            <td><input type="checkbox" name="{{ $transporteur->id }}" value="{{ $transporteur->id }}"></td>
                            <td>{{ $transporteur->id }}</td>
                            <td>{{ $transporteur->code }}</td>
                            <td>
                                
                                            <button title="Détails" >
                                                <a class="btn btn-primary " href="{{ route('transporteur.show', ['transporteur' => $transporteur->id]) }}">
                                                  +
                                                  </a>
                                            </button>
                                                
                                            <a  class="btn btn-warning " title="Modifier le transporteur du code {{ $transporteur->code }}" href="{{ route('transporteur.edit', ['transporteur' => $transporteur->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <form style="display: inline;"></form>
                                            <form style="display: inline;" action="{{ route('transporteur.destroy', ['transporteur' => $transporteur->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer le transporteur du code {{ $transporteur->code }}"
                                                        onClick="return confirm('Supprimer le transporteur du code {{ $transporteur->code }}')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                            </form>
                                            
                            </td>
                        </tr>
                    @empty
                        <p style="background-color: rgb(63, 15, 236)">Aucun transporteur disponible</p>
                    @endforelse
                </tbody>


            </table>
        </form>
    </div>

</x-app-layout>
