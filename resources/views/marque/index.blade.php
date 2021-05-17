<x-app-layout>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Liste des marques') }}
      </h2>
     
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Marques</li>
  </ol> 
  <div class="container">
    <button>
      <a class="btn btn-success btn-icon " href="{{route('marque.create')}}">Ajouter une marque</a>
     </button>
       
    <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Actions</th>
          
         
        </tr>
      </thead>
      <tbody>
        @forelse  ($marques as $marque)
        <tr>
          <td>{{$marque->id}}</td>
          <td>{{$marque->name}}</td>
          <td>
                                
            <button title="Détails" >
                <a class="btn btn-primary " href="{{ route('marque.show', ['marque' => $marque->id]) }}">
                  +
                  </a>
            </button>

            <button  class="btn btn-warning ">
                
                <a title="Modifier la marque  {{ $marque->name }}" href="{{ route('marque.edit', ['marque' => $marque->id]) }}">
                    <i class="fa fa-edit"></i>Modifier
                </a>

            </button>
            <form style="display: inline;"></form>
            <form style="display: inline;" action="{{ route('marque.destroy', ['marque' => $marque->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer la marque {{ $marque->name }}"
                        onClick="return confirm('Supprimer la marque?')">
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

    

  
 

       
         

