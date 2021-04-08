<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Liste des conditionnement logistiques') }}
      </h2>
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
  </x-slot>

  <div class="container">

    <form action="{{ route('actionConditionnementLogistique') }}" method="GET">
      @csrf
      <button>
              <a class="btn btn-success btn-icon " href="{{ route('conditionnementLogistique.create') }}">Ajouter</a>
          </button>
          <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                  onClick="return confirm('Supprimer  !? ')"> Supprimer</button>
    <table class="table table-hover" id="table">
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
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                      <button>
                          <a class="btn btn-success btn-icon "
                              href="{{ route('conditionnementLogistique.show', ['conditionnementLogistique' => $conditionnementLogistique->id]) }}">Plus</a>
                      </button>

                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <button>
                          <a class="btn btn-warning "
                              href="{{ route('conditionnementLogistique.edit', ['conditionnementLogistique' => $conditionnementLogistique->id]) }}">Modifier</a>
                      </button>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                          <form action="{{ route('conditionnementLogistique.destroy', ['conditionnementLogistique' => $conditionnementLogistique->id]) }}"
                              method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="input" name="submit" class="btn btn-danger btn-icon"
                                  onClick="return confirm('Supprimer {{ $conditionnementLogistique->codeconditionnementLogistique }} !? ')">
                                  Supprimer</button>
                          </form>
                    </div>
                  </div>
                 
            </div>
          </td>
     
        </tr>
        @empty
        <p>Vide!</p>
    @endforelse  
      </tbody>


    </table>

  </div>
</x-app-layout>

    

  
 

       
         

