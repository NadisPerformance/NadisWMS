<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des magasins') }}
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
            <li class="breadcrumb-item active">Magasins</li>
        </ol> 
    <div class="container">
        <form action="{{ route('actionMagasin') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('magasin.create') }}">Ajouter</a>
                </button>
                <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                    onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
            </div>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Action</th>
        

                    </tr>
                </thead>

                <tbody>
                    @forelse ($magasins as $magasin)
                        <tr>
                            <td><input type="checkbox" name="{{ $magasin->id }}" value="{{ $magasin->id }}"></td>
                            <td>{{ $magasin->id }}</td>
                            <td>{{ $magasin->code }}</td>
                            <td>
                                
                                            <button title="Détails" >
                                                <a class="btn btn-primary " href="{{ route('magasin.show', ['magasin' => $magasin->id]) }}">
                                                  +
                                                  </a>
                                            </button>
        
                                            <button  class="btn btn-warning ">
                                                
                                                <a title="Modifier magasin du code {{ $magasin->code }}" href="{{ route('magasin.edit', ['magasin' => $magasin->id]) }}">
                                                    <i class="fa fa-edit"></i>Modifier
                                                </a>
                        
                                            </button>
                                         
                                            <form style="display: inline;"></form>
                                            <form style="display: inline;" action="{{ route('magasin.destroy', ['magasin' => $magasin->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="input" name="submit" class="btn btn-danger" title="Supprimer magasin du code {{ $magasin->code }}"
                                                    onClick="return confirm('Supprimer {{ $magasin->code }} !? ')">
                                                    <i class="fa fa-trash"></i>Supprimer
                                                </button>
                                            </form>
                                            
                                            <button title="Supprimer les emplacements du magasin du code {{ $magasin->code }}" 
                                                    type="submit" name="id" value="{{$magasin->id}}" class="btn btn-danger"
                                                    onClick="return confirm('Supprimer les emplacements de magasin {{ $magasin->code }} !?')">
                                                     -
                                            </button>
                                            
                                               
                                                   
                                            <a title="Ajouter des emplacements pour le magasin du code {{ $magasin->code }}" 
                                                        class="btn btn-success pull-right" role="button" 
                                                        href="{{ route('emplacement.create', ['id' => $magasin->id]) }}">
                                                        <i class="fa fa-table"></i>+
                                                        
                                            </a>
                                                         
                                                   
                                         
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
