<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List variants') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('variant.create')}}">Ajouter une variant</a>
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
      @forelse  ($variants as $variant)
      <tbody>
        
        <tr>
          <td>{{$variant->id}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('variant.show',['variant'=>$variant->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('variant.edit',['variant'=>$variant->id])}}">Modifier</a>
          </button></td>
          <td>
            <form action="{{route('variant.destroy',['variant'=>$variant->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$variant->name}} !? ')"> Supprimer</button>
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

    

  
 

       
         

