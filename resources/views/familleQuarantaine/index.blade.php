<x-app-layout>

      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Liste des familles de quarantaine') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('familleQuarantaine.create')}}">Ajouter une familleQuarantaine</a>
       </button>
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Familles de quarantaine</li>
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
        @forelse  ($familleQuarantaines as $familleQuarantaine)
        <tr>
          <td>{{$familleQuarantaine->id}}</td>
          <td>
                                
            <button title="Détails" >
                <a class="btn btn-primary " href="{{ route('familleQuarantaine.show', ['familleQuarantaine' => $familleQuarantaine->id]) }}">
                  +
                  </a>
            </button>

            <button  class="btn btn-warning ">
                
                <a title="Modifier la famille de quarantaine d'id {{ $familleQuarantaine->id }}" href="{{ route('familleQuarantaine.edit', ['familleQuarantaine' => $familleQuarantaine->id]) }}">
                    <i class="fa fa-edit"></i>Modifier
                </a>

            </button>
            <form style="display: inline;"></form>
            <form style="display: inline;" action="{{ route('familleQuarantaine.destroy', ['familleQuarantaine' => $familleQuarantaine->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer la famille de quarantaine d'id  {{ $familleQuarantaine->id }}"
                        onClick="return confirm('Suppriment la famille de quarantaine ')">
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

    

  
 

       
         

