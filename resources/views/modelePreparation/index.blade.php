<x-app-layout>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Lists des modeles de préparation') }}
      </h2>
      
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Modeles de préparation</li>
  </ol> 
  <button>
    <a class="btn btn-success btn-icon " href="{{route('modelePreparation.create')}}">Ajouter</a>
   </button>
  <div class="container">

       
    <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Code de conditionnement logistique</th>
          <th>Actions</th>
          
         
        </tr>
      </thead>
      @forelse  ($modelePreparations as $modelePreparation)
      <tbody>
        
        <tr>
          <td>{{$modelePreparation->id}}</td>
          <td>{{$modelePreparation->conditionnementLogistiques->code}}</td>
          <td>
                                
            <button title="Détails" >
                <a class="btn btn-primary " href="{{ route('modelePreparation.show', ['modelePreparation' => $modelePreparation->id]) }}">
                  +
                  </a>
            </button>

            <button  class="btn btn-warning ">
                
                <a title="Modifier le modele de preparation d'id {{ $modelePreparation->id }}" href="{{ route('modelePreparation.edit', ['modelePreparation' => $modelePreparation->id]) }}">
                    <i class="fa fa-edit"></i>Modifier
                </a>

            </button>
            <form style="display: inline;"></form>
            <form style="display: inline;" action="{{ route('modelePreparation.destroy', ['modelePreparation' => $modelePreparation->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer le modele de preparation d'id  {{ $modelePreparation->id }}"
                        onClick="return confirm('Supprimer le modele de preparation?')">
                        <i class="fa fa-trash"></i>Supprimer
                    </button>
            </form>
            
          </td>       
     
        </tr>
      </tbody>
      @empty
    <p>Vide!</p>
@endforelse  

    </table>

  </div>
</x-app-layout>

    

  
 

       
         

