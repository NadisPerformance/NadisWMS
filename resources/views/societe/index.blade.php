<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List societes') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('societe.create')}}">Ajouter une societe</a>
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
      @forelse  ($societes as $societe)
      <tbody>
        
        <tr>
          <td>{{$societe->id}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('societe.show',['societe'=>$societe->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('societe.edit',['societe'=>$societe->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('societe.destroy',['societe'=>$societe->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$societe->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

