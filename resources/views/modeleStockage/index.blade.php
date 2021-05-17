<x-app-layout>
 
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Liste des modéles de stockage') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('modeleStockage.create')}}">Ajouter une modeleStockage</a>
       </button>
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{route('modeleStockage.index')}}">Modéles de stockage</a></li>
    </ol>

  <div class="container">
    <table class="table table-bordered"  id="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Action</th>
        </tr>
      </thead>
      
      <tbody>
        @forelse  ($modeleStockages as $modeleStockage)
        <tr>
          <td>{{$modeleStockage->id}}</td>
          <td>
                                
            <button title="Détails" >
                <a class="btn btn-primary " href="{{ route('modeleStockage.show', ['modeleStockage' => $modeleStockage->id]) }}">
                  +
                  </a>
            </button>

            <button  class="btn btn-warning ">
                
                <a title="Modifier le modéle de stockage d'id {{ $modeleStockage->id }}" href="{{ route('modeleStockage.edit', ['modeleStockage' => $modeleStockage->id]) }}">
                    <i class="fa fa-edit"></i>Modifier
                </a>

            </button>
            <form style="display: inline;"></form>
            <form style="display: inline;" action="{{ route('modeleStockage.destroy', ['modeleStockage' => $modeleStockage->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer le modele de stockage d'id{{ $modeleStockage->id }}"
                        onClick="return confirm('Suppriment le modele de stockage')">
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

    

  
 

       
         

