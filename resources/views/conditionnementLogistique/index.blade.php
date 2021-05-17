<x-app-layout>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Liste des conditionnements logistiques') }}
      </h2>
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Conditionnements logistiques</li>
  </ol> 
  <div class="container">

    <form action="{{ route('actionConditionnementLogistique') }}" method="GET">
      @csrf
      <button>
              <a class="btn btn-success btn-icon " href="{{ route('conditionnementLogistique.create') }}">Ajouter</a>
          </button>
          <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                  onClick="return confirm('Supprimer  !? ')"> Supprimer</button>
    <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <th><input type="checkbox" onclick="checkAll(this)"></th>
          <th>ID</th>
          <th>Code</th>
          <th>Type</th>
          <th>Actions</th>
         
        </tr>
      </thead>
      
      <tbody>
        @forelse  ($conditionnementLogistiques as $conditionnementLogistique)
        <tr>
          <td><input type="checkbox" name="{{ $conditionnementLogistique->id }}" value="{{ $conditionnementLogistique->id }}"></td>
          <td>{{$conditionnementLogistique->id}}</td>
          <td>{{$conditionnementLogistique->code}}</td>
          <td>{{$conditionnementLogistique->type}}</td>
          <td>
                                
            <button title="Détails" >
                <a class="btn btn-primary " href="{{ route('conditionnementLogistique.show', ['conditionnementLogistique' => $conditionnementLogistique->id]) }}">
                  +
                  </a>
            </button>

            <button  class="btn btn-warning ">
                
                <a title="Modifier le conditionnement logistique du code{{ $conditionnementLogistique->code }}" href="{{ route('conditionnementLogistique.edit', ['conditionnementLogistique' => $conditionnementLogistique->id]) }}">
                    <i class="fa fa-edit"></i>Modifier
                </a>

            </button>
            <form style="display: inline;"></form>
            <form style="display: inline;" action="{{ route('conditionnementLogistique.destroy', ['conditionnementLogistique' => $conditionnementLogistique->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer le conditionnement logistique du code {{ $conditionnementLogistique->code }}"
                        onClick="return confirm('Suppriment le conditionnement logistique?')">
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

    

  
 

       
         

