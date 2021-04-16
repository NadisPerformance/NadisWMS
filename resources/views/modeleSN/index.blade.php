<x-app-layout>
  <x-slot name="header">
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
  </x-slot>

  <div class="container"> 
    <form action="{{ route('actionModeleSN') }}" method="GET">
      @csrf
      <button>
        <a class="btn btn-success btn-icon " href="{{route('modeleSN.create')}}">Ajouter une modeleSN</a>
      </button>
      <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
          onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
      <table class="table table-hover" id="table">
      <thead>
        <tr>
          <th><input type="checkbox" onclick="checkAll(this)"></th>
          <th>ID</th>
          <th></th>
          <th></th>
          <th></th>
         
        </tr>
      </thead>
     
      <tbody>
        @forelse  ($modeleSNs as $modeleSN)
        <tr>
          <td><input type="checkbox" name="{{ $modeleSN->id }}" value="{{ $modeleSN->id }}"></td>
          <td>{{$modeleSN->id}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('modeleSN.show',['modeleSN'=>$modeleSN->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('modeleSN.edit',['modeleSN'=>$modeleSN->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('modeleSN.destroy',['modeleSN'=>$modeleSN->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$modeleSN->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

