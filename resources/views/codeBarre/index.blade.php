<x-app-layout>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List des codes à barre') }}
      </h2>
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
      @if (session('msge'))
        <h3 style="color: red">
            {{ session()->get('msge') }}
        </h3>
        @endif
    @endif
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Codes à barre</li>
  </ol> 
  <div class="container">
    <form action="{{ route('actionCodeBarre') }}" method="GET">
      @csrf
      <button>
        <a class="btn btn-success btn-icon " href="{{route('codeBarre.create')}}">Ajouter</a>
      </button>
      <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
          onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
       
    <table class="table table-bordered"  id="table">
      <thead>
        <tr>
          <th><input type="checkbox" onclick="checkAll(this)"></th>
          <th>ID</th>
          <th>Value</th>
          <th>Actions</th>
        </tr>
      </thead>
    
      <tbody>
        @forelse  ($codeBarres as $codeBarre)
        <tr>
          <td><input type="checkbox" name="{{ $codeBarre->id }}" value="{{ $codeBarre->id }}"></td>
          <td>{{$codeBarre->id}}</td>
          <td>{{$codeBarre->value}}</td>
          <td>
                                
            <button title="Détails" >
                <a class="btn btn-primary " href="{{ route('codeBarre.show', ['codeBarre' => $codeBarre->id]) }}">
                  +
                  </a>
            </button>

            <button  class="btn btn-warning ">
                
                <a title="Modifier le code à barre du value {{ $codeBarre->value }}" href="{{ route('codeBarre.edit', ['codeBarre' => $codeBarre->id]) }}">
                    <i class="fa fa-edit"></i>Modifier
                </a>

            </button>
            <form style="display: inline;"></form>
            <form style="display: inline;" action="{{ route('codeBarre.destroy', ['codeBarre' => $codeBarre->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer le code à barre du value {{ $codeBarre->value }}"
                        onClick="return confirm('Supprimer le code à barre ')">
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

    

  
 

       
         

