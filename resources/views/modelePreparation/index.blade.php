<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List modele de préparation') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('modelePreparation.create')}}">Ajouter une modelePreparation</a>
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
          <th>Code de conditionnement logistique</th>
          <th></th>
          <th></th>
          <th></th>
         
        </tr>
      </thead>
      @forelse  ($modelePreparations as $modelePreparation)
      <tbody>
        
        <tr>
          <td>{{$modelePreparation->id}}</td>
          <td>{{$modelePreparation->conditionnementLogistiques->code}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('modelePreparation.show',['modelePreparation'=>$modelePreparation->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('modelePreparation.edit',['modelePreparation'=>$modelePreparation->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('modelePreparation.destroy',['modelePreparation'=>$modelePreparation->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$modelePreparation->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

