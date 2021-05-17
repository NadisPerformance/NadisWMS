<x-app-layout>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Liste des familles de colisage') }}
      </h2>
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
      @endif
      @if (session('msge'))
        <h3 style="color: red">
            {{ session()->get('msge') }}
        </h3>
      @endif
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Familles de colisage</li>
    </ol> 

  <div class="container">
    <form action="{{ route('actionFamilleColisage') }}" method="GET">
        @csrf
        <button>
            <a class="btn btn-success btn-icon " href="{{ route('familleColisage.create') }}">Ajouter</a>
        </button>
        <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
            onClick="return confirm('Supprimer  les sélections ')"> Supprimer</button>
            <table class="table table-bordered"  id="table">
                <thead>
                <tr>
                    <th><input type="checkbox" onclick="checkAll(this)"></th>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Action</th>
    

                </tr>
            </thead>

            <tbody>
                @forelse ($familleColisages as $familleColisage)
                    <tr>
                        <td><input type="checkbox" name="{{ $familleColisage->id }}" value="{{ $familleColisage->id }}"></td>
                        <td>{{ $familleColisage->id }}</td>
                        <td>{{ $familleColisage->name }}</td>
                        <td>
                                
                            <button title="Détails" >
                                <a class="btn btn-primary " href="{{ route('familleColisage.show', ['familleColisage' => $familleColisage->id]) }}">
                                  +
                                  </a>
                            </button>

                            <button  class="btn btn-warning ">
                                
                                <a title="Modifier la famille de colisage {{ $familleColisage->name }}" href="{{ route('familleColisage.edit', ['familleColisage' => $familleColisage->id]) }}">
                                    <i class="fa fa-edit"></i>Modifier
                                </a>
        
                            </button>
                            <form style="display: inline;"></form>
                            <form style="display: inline;" action="{{ route('familleColisage.destroy', ['familleColisage' => $familleColisage->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer la famille de colisage {{ $familleColisage->name }}"
                                        onClick="return confirm('Suppriment la famille de colisage')">
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
