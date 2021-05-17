  
  <x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du code à barre  {{$codeBarre->value}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('codeBarre.index')}}">Codes à barre</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>
    
    <div class="container">           
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Value</th>
            <th>Code de conditionnement logistique</th>
            <th>Code d'article</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$codeBarre->id}}</td>
            <td>{{$codeBarre->value}}</td>
            <td>
              <a href="{{ route('conditionnementLogistique.show', ['conditionnementLogistique' => $codeBarre->conditionnementLogistiques->id]) }}">{{$codeBarre->conditionnementLogistiques->code}}</a>
            </td>
            <td>
              <a href="{{ route('article.show', ['article' => $codeBarre->conditionnementLogistiques->articles->id]) }}">{{$codeBarre->conditionnementLogistiques->articles->codeArticle}}</a>
            </td>
            <td>{{$codeBarre->updated_at}}</td>
            <td>{{$codeBarre->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
