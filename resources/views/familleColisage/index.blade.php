<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List familleColisages') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('familleColisage.create')}}">Ajouter une familleColisage</a>
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
      @forelse  ($familleColisages as $familleColisage)
      <tbody>
        
        <tr>
          <td>{{$familleColisage->id}}</td>
          <td>{{$familleColisage->name}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('familleColisage.show',['familleColisage'=>$familleColisage->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('familleColisage.edit',['familleColisage'=>$familleColisage->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('familleColisage.destroy',['familleColisage'=>$familleColisage->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$familleColisage->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

