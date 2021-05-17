<x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des contactes') }}
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
            <li class="breadcrumb-item active">Contactes</li>
        </ol> 

    <div class="container">
        <form action="{{ route('actionContacte') }}" method="GET">
            @csrf
            <div style="margin-top: 3%">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('contacte.create') }}">Ajouter</a>
                </button>
                <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                    onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
            </div>
            <table class="table table-bordered"  id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>ID</th>
                        <th>Responsable société</th>
                        <th>Action</th>
        

                    </tr>
                </thead>

                <tbody>
                    @forelse ($contactes as $contacte)
                        <tr>
                            <td><input type="checkbox" name="{{ $contacte->id }}" value="{{ $contacte->id }}"></td>
                            <td>{{ $contacte->id }}</td>
                            <td>{{ $contacte->responsableSociete }}</td>
                            <td>
                                
                                            <button title="Détails" >
                                                <a class="btn btn-primary " href="{{ route('contacte.show', ['contacte' => $contacte->id]) }}">
                                                  +
                                                  </a>
                                            </button>
        
                                            <button  class="btn btn-warning ">
                                                
                                                <a title="Modifier contacte d'id {{ $contacte->id }}" href="{{ route('contacte.edit', ['contacte' => $contacte->id]) }}">
                                                    <i class="fa fa-edit"></i>Modifier
                                                </a>
                        
                                            </button>
                                            <form style="display: inline;"></form>
                                            <form style="display: inline;" action="{{ route('contacte.destroy', ['contacte' => $contacte->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer contacte d'id {{ $contacte->id }}"
                                                        onClick="return confirm('Suppriment le contacte')">
                                                        <i class="fa fa-trash"></i>Supprimer
                                                    </button>
                                            </form>
                                            
                            </td>
                        </tr>
                    @empty
                        <p style="background-color: rgb(63, 15, 236)">Aucun contacte disponible</p>
                    @endforelse
                </tbody>


            </table>
        </form>
    </div>

</x-app-layout>
