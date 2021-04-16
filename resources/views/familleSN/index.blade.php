<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des familles de S\N') }}
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
    </x-slot>

    <div class="container">
        <form action="{{ route('actionFamilleSN') }}" method="GET">
            @csrf
            <button>
                <a class="btn btn-success btn-icon " href="{{ route('familleSN.create') }}">Ajouter</a>
            </button>
            <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Action</th>
        

                    </tr>
                </thead>

                <tbody>
                    @forelse ($familleSNs as $familleSN)
                        <tr>
                            <td><input type="checkbox" name="{{ $familleSN->id }}" value="{{ $familleSN->id }}"></td>
                            <td>{{ $familleSN->id }}</td>
                            <td>{{ $familleSN->code }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button>
                                                <a class="btn btn-success btn-icon "
                                                    href="{{ route('familleSN.show', ['familleSN' => $familleSN->id]) }}">Plus</a>
                                            </button>
        
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <button>
                                                <a class="btn btn-warning "
                                                    href="{{ route('familleSN.edit', ['familleSN' => $familleSN->id]) }}">Modifier</a>
                                            </button>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                                <form action="{{ route('familleSN.destroy', ['familleSN' => $familleSN->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="input" name="submit" class="btn btn-danger btn-icon"
                                                        onClick="return confirm('Supprimer {{ $familleSN->code }} !? ')">
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
