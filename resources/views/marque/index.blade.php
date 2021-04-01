<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List marques') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('marque.create')}}">Ajouter une marque</a>
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
          <th>Nom</th>
          <th></th>
          <th></th>
          <th></th>
         
        </tr>
      </thead>
      @forelse  ($marques as $marque)
      <tbody>
        
        <tr>
          <td>{{$marque->id}}</td>
          <td>{{$marque->name}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('marque.show',['marque'=>$marque->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('marque.edit',['marque'=>$marque->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('marque.destroy',['marque'=>$marque->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$marque->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

