<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List conditionnementLogistiques') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('conditionnementLogistique.create')}}">Ajouter une conditionnementLogistique</a>
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
          <th>Code</th>
          <th>Type</th>
          <th></th>
          <th></th>
          <th></th>
         
        </tr>
      </thead>
      @forelse  ($conditionnementLogistiques as $conditionnementLogistique)
      <tbody>
        
        <tr>
          <td>{{$conditionnementLogistique->id}}</td>
          <td>{{$conditionnementLogistique->code}}</td>
          <td>{{$conditionnementLogistique->type}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('conditionnementLogistique.show',['conditionnementLogistique'=>$conditionnementLogistique->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('conditionnementLogistique.edit',['conditionnementLogistique'=>$conditionnementLogistique->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('conditionnementLogistique.destroy',['conditionnementLogistique'=>$conditionnementLogistique->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$conditionnementLogistique->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

