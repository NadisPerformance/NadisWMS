<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des tiers') }}
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
            <li class="breadcrumb-item active">Tiers</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionTier') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('tier.create') }}">Ajouter</a>
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
                    @forelse ($tiers as $tier)
                        <tr>
                            <td><input type="checkbox" name="{{ $tier->id }}" value="{{ $tier->id }}"></td>
                            <td>{{ $tier->id }}</td>
                            <td>{{ $tier->code }}</td>
                            <td>
                                
                                            <button title="Détails" >
                                                <a class="btn btn-primary " href="{{ route('tier.show', ['tier' => $tier->id]) }}">
                                                  +
                                                  </a>
                                            </button>
        
                                            <button  class="btn btn-warning ">
                                                
                                                <a title="Modifier tier du code {{ $tier->code }}" href="{{ route('tier.edit', ['tier' => $tier->id]) }}">
                                                    <i class="fa fa-edit"></i>Modifier
                                                </a>
                        
                                            </button>
                                            <form style="display: inline;"></form>
                                            <form style="display: inline;" action="{{ route('tier.destroy', ['tier' => $tier->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer tier du code {{ $tier->code }}"
                                                        onClick="return confirm('Suppriment le tier')">
                                                        <i class="fa fa-trash"></i>Supprimer
                                                    </button>
                                            </form>
                                            
                            </td>
                        </tr>
                    @empty
                        <p style="background-color: rgb(63, 15, 236)">Aucun tier disponible</p>
                    @endforelse
                </tbody>


            </table>
        </form>
    </div>

</x-app-layout>
