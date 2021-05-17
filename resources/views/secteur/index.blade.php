<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des secteurs') }}
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
            <li class="breadcrumb-item active">Secteurs</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionSecteur') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('secteur.create') }}">Ajouter</a>
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
                        <th>Action</th>
        

                    </tr>
                </thead>

                <tbody>
                    @forelse ($secteurs as $secteur)
                        <tr>
                            <td><input type="checkbox" name="{{ $secteur->id }}" value="{{ $secteur->id }}"></td>
                            <td>{{ $secteur->id }}</td>
                            <td>{{ $secteur->code }}</td>
                            <td>
                                
                                            <button title="Détails" >
                                                <a class="btn btn-primary " href="{{ route('secteur.show', ['secteur' => $secteur->id]) }}">
                                                  +
                                                  </a>
                                            </button>
        
                                            <button  class="btn btn-warning ">
                                                
                                                <a title="Modifier secteur du code {{ $secteur->code }}" href="{{ route('secteur.edit', ['secteur' => $secteur->id]) }}">
                                                    <i class="fa fa-edit"></i>Modifier
                                                </a>
                        
                                            </button>
                                            <form style="display: inline;"></form>
                                            <form style="display: inline;" action="{{ route('secteur.destroy', ['secteur' => $secteur->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer secteur du code {{ $secteur->code }}"
                                                        onClick="return confirm('Supprimer {{ $secteur->code }} !? ')">
                                                        <i class="fa fa-trash"></i>Supprimer
                                                    </button>
                                            </form>
                                            
                            </td>
                        </tr>
                    @empty
                        <p style="background-color: rgb(63, 15, 236)">Aucun enregistrement disponible</p>
                    @endforelse
                </tbody>


            </table>
        </form>
    </div>

</x-app-layout>
