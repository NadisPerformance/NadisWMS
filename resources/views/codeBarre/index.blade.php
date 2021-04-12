<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List des codes à Barre') }}
      </h2>
      @if (session('msg'))
      <h3 style="color: green">
       {{session()->get('msg')}}
      </h3>
      @if (session('msge'))
        <h3 style="color: red">
            {{ session()->get('msge') }}
        </h3>
        @endif
    @endif
  </x-slot>

  <div class="container">
    <form action="{{ route('actionCodeBarre') }}" method="GET">
      @csrf
      <button>
        <a class="btn btn-success btn-icon " href="{{route('codeBarre.create')}}">Ajouter</a>
      </button>
      <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
          onClick="return confirm('Supprimer les séléctions')"> Supprimer</button>
       
    <table class="table table-hover"  id="table">
      <thead>
        <tr>
          <th><input type="checkbox" onclick="checkAll(this)"></th>
          <th>ID</th>
          <th>Value</th>
          <th></th>
          <th></th>
          <th></th>
         
        </tr>
      </thead>
    
      <tbody>
        @forelse  ($codeBarres as $codeBarre)
        <tr>
          <td><input type="checkbox" name="{{ $codeBarre->id }}" value="{{ $codeBarre->id }}"></td>
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
        @empty
    <p>Vide!</p>
@endforelse 
      </tbody>
       

    </table>
  </form>
  </div>
</x-app-layout>

    

  
 

       
         

