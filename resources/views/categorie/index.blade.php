<x-app-layout>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Liste des categories') }}
      </h2>
      
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Categories</li>
  </ol> 
  <div class="container">

    <button>
      <a class="btn btn-success btn-icon " href="{{route('categorie.create')}}">Ajouter une categorie</a>
     </button>       
    <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Value</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse  ($categories as $categorie)
        <tr>
          <td>{{$categorie->id}}</td>
          <td>{{$categorie->value}}</td>
          <td>
                                
            <button title="Détails" >
                <a class="btn btn-primary " href="{{ route('categorie.show', ['categorie' => $categorie->id]) }}">
                  +
                  </a>
            </button>

            <button  class="btn btn-warning ">
                
                <a title="Modifier le categorie de value {{ $categorie->value }}" href="{{ route('categorie.edit', ['categorie' => $categorie->id]) }}">
                    <i class="fa fa-edit"></i>Modifier
                </a>

            </button>
            <form style="display: inline;"></form>
            <form style="display: inline;" action="{{ route('categorie.destroy', ['categorie' => $categorie->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer le categorie de value {{ $categorie->value }}"
                        onClick="return confirm('Supprimer le categorie?')">
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

    

  
 

       
         

