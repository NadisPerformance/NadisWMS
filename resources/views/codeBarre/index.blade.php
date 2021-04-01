<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List codes à Barres') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('codeBarre.create')}}">Ajouter une codeBarre</a>
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
      @forelse  ($codeBarres as $codeBarre)
      <tbody>
        
        <tr>
          <td>{{$codeBarre->id}}</td>
          <td>{{$codeBarre->value}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('codeBarre.show',['codeBarre'=>$codeBarre->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('codeBarre.edit',['codeBarre'=>$codeBarre->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('codeBarre.destroy',['codeBarre'=>$codeBarre->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$codeBarre->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

