  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails de la famille {{$famille->name}}
        </h2>

        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('famille.index')}}">Familles</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>
    
    <div class="container">           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Code</th>
            <th>Etat</th>
            <th>Type</th>
            <th>Libellé</th>
            <th>updated_at</th>
            <th>created_at</th>
            <th>Articles</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$famille->id}}</td>
            <td>{{$famille->name}}</td>
            <td>{{$famille->code}}</td>
            <td>{{$famille->etat}}</td>
            <td>{{$famille->type}}</td>
            <td>{{$famille->Libelle}}</td>
            <td>{{$famille->updated_at}}</td>
            <td>{{$famille->created_at}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les code des articles</option>
                @forelse ($famille->articles()->get() as $article)
                <option value="{{ route('article.show', ['article' => $article->id]) }}">{{$article->codeArticle}}</option>
                @empty
                 <p>Vide!</p>
                @endforelse
            </select>
            </td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
