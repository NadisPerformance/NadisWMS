<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des fournisseurs') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Fournisseurs</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionFournisseur') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('fournisseur.create') }}">Ajouter</a>
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
                    @forelse ($fournisseurs as $fournisseur)
                        <tr>
                            <td><input type="checkbox" name="{{ $fournisseur->id }}" value="{{ $fournisseur->id }}"></td>
                            <td>{{ $fournisseur->id }}</td>
                            <td>{{ $fournisseur->code }}</td>
                            <td>
                                
                                            <button title="Détails" >
                                                <a class="btn btn-primary " href="{{ route('fournisseur.show', ['fournisseur' => $fournisseur->id]) }}">
                                                  +
                                                  </a>
                                            </button>
        
                                            <button  class="btn btn-warning ">
                                                
                                                <a title="Modifier le fournisseur du code {{ $fournisseur->code }}" href="{{ route('fournisseur.edit', ['fournisseur' => $fournisseur->id]) }}">
                                                    <i class="fa fa-edit"></i>Modifier
                                                </a>
                        
                                            </button>
                                            <form style="display: inline;"></form>
                                            <form style="display: inline;" action="{{ route('fournisseur.destroy', ['fournisseur' => $fournisseur->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer le fournisseur du code {{ $fournisseur->code }}"
                                                        onClick="return confirm('Supprimer le fournisseur du code {{ $fournisseur->code }}')">
                                                        <i class="fa fa-trash"></i>Supprimer
                                                    </button>
                                            </form>
                                            
                            </td>
                        </tr>
                    @empty
                        <p style="background-color: rgb(63, 15, 236)">Aucun fournisseur disponible</p>
                    @endforelse
                </tbody>


            </table>
        </form>
    </div>

</x-app-layout>
