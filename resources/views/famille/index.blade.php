<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List familles') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('famille.create')}}">Ajouter une famille</a>
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
      @forelse  ($familles as $famille)
      <tbody>
        
        <tr>
          <td>{{$famille->id}}</td>
          <td>{{$famille->name}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('famille.show',['famille'=>$famille->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('famille.edit',['famille'=>$famille->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('famille.destroy',['famille'=>$famille->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$famille->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

