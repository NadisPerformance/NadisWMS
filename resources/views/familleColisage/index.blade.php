<x-app-layout>
  <x-slot name="header">
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
  </x-slot>

  <div class="container">
    <form action="{{ route('actionFamilleColisage') }}" method="GET">
        @csrf
        <button>
            <a class="btn btn-success btn-icon " href="{{ route('familleColisage.create') }}">Ajouter</a>
        </button>
        <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
            onClick="return confirm('Supprimer  les sélections ')"> Supprimer</button>
        <table class="table table-hover" id="table">
            <thead>
                <tr>
                    <th><input type="checkbox" onclick="checkAll(this)"></th>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Acton</th>
    

                </tr>
            </thead>

            <tbody>
                @forelse ($familleColisages as $familleColisage)
                    <tr>
                        <td><input type="checkbox" name="{{ $familleColisage->id }}" value="{{ $familleColisage->id }}"></td>
                        <td>{{ $familleColisage->id }}</td>
                        <td>{{ $familleColisage->name }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button>
                                            <a class="btn btn-success btn-icon "
                                                href="{{ route('familleColisage.show', ['familleColisage' => $familleColisage->id]) }}">Plus</a>
                                        </button>
    
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <button>
                                            <a class="btn btn-warning "
                                                href="{{ route('familleColisage.edit', ['familleColisage' => $familleColisage->id]) }}">Modifier</a>
                                        </button>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                            <form action="{{ route('familleColisage.destroy', ['familleColisage' => $familleColisage->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="input" name="submit" class="btn btn-danger btn-icon"
                                                    onClick="return confirm('Supprimer {{ $familleColisage->name }} !? ')">
                                                    Supprimer</button>
                                            </form>
                                      </div>
                                    </div>
                                   
                              </div>
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
