<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des sites') }}
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
            <li class="breadcrumb-item active">Sites</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionSite') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('site.create') }}">Ajouter</a>
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
                        <th>Acton</th>
        

                    </tr>
                </thead>

                <tbody>
                    @forelse ($sites as $site)
                        <tr>
                            <td><input type="checkbox" name="{{ $site->id }}" value="{{ $site->id }}"></td>
                            <td>{{ $site->id }}</td>
                            <td>{{ $site->code }}</td>
                            <td>
                                
                                <button title="Détails" >
                                    <a class="btn btn-primary " href="{{ route('site.show', ['site' => $site->id]) }}">
                                      +
                                      </a>
                                </button>

                                <button  class="btn btn-warning ">
                                    
                                    <a title="Modifier site du code {{ $site->code }}" href="{{ route('site.edit', ['site' => $site->id]) }}">
                                        <i class="fa fa-edit"></i>Modifier
                                    </a>
            
                                </button>
                                <form style="display: inline;"></form>
                                <form style="display: inline;" action="{{ route('site.destroy', ['site' => $site->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="input" name="submit" class="btn btn-danger" title="Supprimer site du code {{ $site->code }}"
                                            onClick="return confirm('Suppriment le site')">
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
