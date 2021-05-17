<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des emplacements') }}
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
            <li class="breadcrumb-item active">Emplacements</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionEmplacement') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('emplacement.create') }}">Ajouter</a>
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
                    @forelse ($emplacements as $emplacement)
                        <tr>
                            <td><input type="checkbox" name="{{ $emplacement->id }}" value="{{ $emplacement->id }}"></td>
                            <td>{{ $emplacement->id }}</td>
                            <td>{{ $emplacement->code }}</td>
                            <td>
                                
                                            <button title="Détails" >
                                                <a class="btn btn-primary " href="{{ route('emplacement.show', ['emplacement' => $emplacement->id]) }}">
                                                  +
                                                  </a>
                                            </button>
        
                                            <button  class="btn btn-warning ">
                                                
                                                <a title="Modifier emplacement du code {{ $emplacement->code }}" href="{{ route('emplacement.edit', ['emplacement' => $emplacement->id]) }}">
                                                    <i class="fa fa-edit"></i>Modifier
                                                </a>
                        
                                            </button>
                                            <form style="display: inline;"></form>
                                            <form style="display: inline;" action="{{ route('emplacement.destroy', ['emplacement' => $emplacement->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer emplacement du code {{ $emplacement->code }}"
                                                        onClick="return confirm('Supprimer {{ $emplacement->code }} !? ')">
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
