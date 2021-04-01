<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List categories') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('categorie.create')}}">Ajouter une categorie</a>
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
          <th>Value</th>
          <th></th>
          <th></th>
          <th></th>
         
        </tr>
      </thead>
      @forelse  ($categories as $categorie)
      <tbody>
        
        <tr>
          <td>{{$categorie->id}}</td>
          <td>{{$categorie->value}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('categorie.show',['categorie'=>$categorie->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('categorie.edit',['categorie'=>$categorie->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('categorie.destroy',['categorie'=>$categorie->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$categorie->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

