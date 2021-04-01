<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('List article') }}
      </h2>
      <button>
        <a class="btn btn-success btn-icon " href="{{route('article.create')}}">Ajouter une article</a>
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
          <th>Etat</th>
          <th></th>
          <th></th>
          <th></th>
         
        </tr>
      </thead>
      @forelse  ($articles as $article)
      <tbody>
        
        <tr>
          <td>{{$article->id}}</td>
          <td>{{$article->codeArticle}}</td>
          <td>{{$article->etat}}</td>
          <td>
           <button>
            <a class="btn btn-success btn-icon " href="{{route('article.show',['article'=>$article->id])}}">Plus</a>
           </button>
          </td>
       
          <td> 
          <button>
          <a class="btn btn-warning " href="{{route('article.edit',['article'=>$article->id])}}">Modifier</a>
          </button></td>
          <td>
           @if ($article->etat=="A supprimer")
          <form action="{{route('article.destroy',['article'=>$article->id])}}" method="POST">
             @csrf
             @method('DELETE')
             <button type="input" name="submit"  class="btn btn-danger btn-icon" onClick="return confirm('Supprimer {{$article->codeArticle}} !? ')"> Supprimer</button>
            </form>
            @endif
         </td>
     
        </tr>
      </tbody>
      @empty
    <p>Vide!</p>
@endforelse  

    </table>

  </div>
</x-app-layout>

    

  
 

       
         

