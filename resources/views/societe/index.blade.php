<x-app-layout>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List societes') }}
      </h2>
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Societes</li>
  </ol> 
  <div class="container">
    <button>
      <a class="btn btn-success btn-icon " href="{{route('societe.create')}}">Ajouter une societe</a>
     </button>
       
    <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse  ($societes as $societe)
        <tr>
          <td>{{$societe->id}}</td>
          <td>
                                
            <button title="Détails" >
                <a class="btn btn-primary " href="{{ route('societe.show', ['societe' => $societe->id]) }}">
                  +
                  </a>
            </button>

            <button  class="btn btn-warning ">
                
                <a title="Modifier la societe {{ $societe->name }}" href="{{ route('societe.edit', ['societe' => $societe->id]) }}">
                    <i class="fa fa-edit"></i>Modifier
                </a>

            </button>
            <form style="display: inline;"></form>
            <form style="display: inline;" action="{{ route('societe.destroy', ['societe' => $societe->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer la societe {{ $societe->name }}"
                        onClick="return confirm('Supprimer la societe?')">
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

  </div>
</x-app-layout>

    

  
 

       
         

