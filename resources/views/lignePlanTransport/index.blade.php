<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des lignes des plans de transport ') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Lignes</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionLignePlanTransport') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('lignePlanTransport.create') }}">Ajouter</a>
                </button>
                <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                    onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
            </div>
            <table class="table table-bordered"  id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>ID</th>
                        <th>Zone</th>
                        <th>Actions</th>
        

                    </tr>
                </thead>

                <tbody>
                    @forelse ($lignePlanTransports as $lignePlanTransport)
                        <tr>
                            <td><input type="checkbox" name="{{ $lignePlanTransport->id }}" value="{{ $lignePlanTransport->id }}"></td>
                            <td>{{ $lignePlanTransport->id }}</td>
                            <td>{{ $lignePlanTransport->zone }}</td>
                            <td>
                                
                                            <button title="Détails" >
                                                <a class="btn btn-primary " href="{{ route('lignePlanTransport.show', ['lignePlanTransport' => $lignePlanTransport->id]) }}">
                                                  +
                                                  </a>
                                            </button>
                                                
                                            <a  class="btn btn-warning " title="Modifier la ligne de plan de transport de zone  {{ $lignePlanTransport->zone }}" href="{{ route('lignePlanTransport.edit', ['lignePlanTransport' => $lignePlanTransport->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <form style="display: inline;"></form>
                                            <form style="display: inline;" action="{{ route('lignePlanTransport.destroy', ['lignePlanTransport' => $lignePlanTransport->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="input" name="submit" class="btn btn-danger" title="Supprimer la ligne de plan de transport de zone  {{ $lignePlanTransport->zone }}"
                                                    onClick="return confirm('Supprimer la ligne de plan de transport de zone  {{ $lignePlanTransport->zone }}')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                        </form>
                                            
                            </td>
                        </tr>
                    @empty
                        <p style="background-color: rgb(63, 15, 236)">Aucun ligne de plan de transport disponible</p>
                    @endforelse
                </tbody>


            </table>
        </form>
    </div>

</x-app-layout>
