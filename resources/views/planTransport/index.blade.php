<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des plans des transports') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Plans des transports</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionPlanTransport') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('planTransport.create') }}">Ajouter</a>
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
                    @forelse ($planTransports as $planTransport)
                        <tr>
                            <td><input type="checkbox" name="{{ $planTransport->id }}" value="{{ $planTransport->id }}"></td>
                            <td>{{ $planTransport->id }}</td>
                            <td>{{ $planTransport->code }}</td>
                            <td>
                                
                                            <button title="Détails" >
                                                <a class="btn btn-primary " href="{{ route('planTransport.show', ['planTransport' => $planTransport->id]) }}">
                                                  +
                                                  </a>
                                            </button>
                                                
                                            <a  class="btn btn-warning " title="Modifier le plan de transport du code {{ $planTransport->code }}" href="{{ route('planTransport.edit', ['planTransport' => $planTransport->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <form style="display: inline;"></form>
                                            <form style="display: inline;" action="{{ route('planTransport.destroy', ['planTransport' => $planTransport->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer le plan de transport du code {{ $planTransport->code }}"
                                                        onClick="return confirm('Supprimer le plan de transport du code {{ $planTransport->code }}')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                            </form>
                                            
                            </td>
                        </tr>
                    @empty
                        <p style="background-color: rgb(63, 15, 236)">Aucun plan de transport disponible</p>
                    @endforelse
                </tbody>


            </table>
        </form>
    </div>

</x-app-layout>
