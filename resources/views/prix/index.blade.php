<x-app-layout>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List prixs') }}
      </h2>
      
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Prixs</li>
  </ol> 
  <div class="container">

    <button>
      <a class="btn btn-success btn-icon " href="{{route('prix.create')}}">Ajouter une prix</a>
     </button>
    <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Actions</th>
          
         
        </tr>
      </thead>
      <tbody>
        @forelse  ($prixs as $prix)
        <tr>
          <td>{{$prix->id}}</td>
          <td>
                                
            <button title="Détails" >
                <a class="btn btn-primary " href="{{ route('prix.show', ['prix' => $prix->id]) }}">
                  +
                  </a>
            </button>

            <button  class="btn btn-warning ">
                
                <a title="Modifier le prix d'id {{ $prix->id }}" href="{{ route('prix.edit', ['prix' => $prix->id]) }}">
                    <i class="fa fa-edit"></i>Modifier
                </a>

            </button>
            <form style="display: inline;"></form>
            <form style="display: inline;" action="{{ route('prix.destroy', ['prix' => $prix->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer le prix d'id {{ $prix->id }}"
                        onClick="return confirm('Supprimer le prix?')">
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

    

  
 

       
         

