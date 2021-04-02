<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List des modéle de S/N') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('modeleSN.create')}}">Ajouter une modeleSN</a>
       </button>
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
    @endif
  </x-slot>

  <div class="container">

       
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th></th>
          <th></th>
          <th></th>
         
        </tr>
      </thead>
      @forelse  ($modeleSNs as $modeleSN)
      <tbody>
        
        <tr>
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
      </tbody>
      @empty
    <p>Vide!</p>
@endforelse  

    </table>

  </div>
</x-app-layout>

    

  
 

       
         

