<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List tests') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('test.create')}}">Ajouter une test</a>
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
      @forelse  ($tests as $test)
      <tbody>
        
        <tr>
          <td>{{$test->id}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('test.show',['test'=>$test->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('test.edit',['test'=>$test->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('test.destroy',['test'=>$test->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$test->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

