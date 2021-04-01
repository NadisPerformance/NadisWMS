<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List familleQuarantaines') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('familleQuarantaine.create')}}">Ajouter une familleQuarantaine</a>
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
      @forelse  ($familleQuarantaines as $familleQuarantaine)
      <tbody>
        
        <tr>
          <td>{{$familleQuarantaine->id}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('familleQuarantaine.show',['familleQuarantaine'=>$familleQuarantaine->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('familleQuarantaine.edit',['familleQuarantaine'=>$familleQuarantaine->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('familleQuarantaine.destroy',['familleQuarantaine'=>$familleQuarantaine->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$familleQuarantaine->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

