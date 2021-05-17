<x-app-layout>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Liste des modéles de S/N') }}
      </h2>
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
        @if (session('msge'))
        <h3 style="color: red">
            {{ session()->get('msge') }}
        </h3>
        @endif
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Modéles de S/N</li>
      </ol> 
  <div class="container"> 
    <form action="{{ route('actionModeleSN') }}" method="GET">
      @csrf
      <button>
        <a class="btn btn-success btn-icon " href="{{route('modeleSN.create')}}">Ajouter</a>
      </button>
      <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
          onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
      <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <th><input type="checkbox" onclick="checkAll(this)"></th>
          <th>ID</th>
          <th>Actions</th>
        </tr>
      </thead>
     
      <tbody>
        @forelse  ($modeleSNs as $modeleSN)
        <tr>
          <td><input type="checkbox" name="{{ $modeleSN->id }}" value="{{ $modeleSN->id }}"></td>
          <td>{{$modeleSN->id}}</td>
          <td>
                                
            <button title="Détails" >
                <a class="btn btn-primary " href="{{ route('modeleSN.show', ['modeleSN' => $modeleSN->id]) }}">
                  +
                  </a>
            </button>

            <button  class="btn btn-warning ">
                
                <a title="Modifier le modéle de S\N d'id {{ $modeleSN->id }}" href="{{ route('modeleSN.edit', ['modeleSN' => $modeleSN->id]) }}">
                    <i class="fa fa-edit"></i>Modifier
                </a>

            </button>
            <form style="display: inline;"></form>
            <form style="display: inline;" action="{{ route('modeleSN.destroy', ['modeleSN' => $modeleSN->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="input" name="submit" class="btn btn-danger" title="Supprimer le modéle de S\N d'id  {{ $modeleSN->id }}"
                        onClick="return confirm('Supprimer le modéle de S\N ? ')">
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

    

  
 

       
         

