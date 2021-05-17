  
  <x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails de variant du code : {{$variant->code}}
        </h2>


    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{route('variant.index')}}">Variants</a></li>
      <li class="breadcrumb-item active">Détails</li>
    </ol>


<div class="container">           
  <table class="table table-bordered" >
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Etat</th>
            <th>Type</th>
            <th>Libellé</th>
            <th>Les codes des articles</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$variant->id}}</td>
            <td>{{$variant->code}}</td>
            <td>{{$variant->etat}}</td>
            <td>{{$variant->type}}</td>
            <td>{{$variant->Libelle}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les code des articles</option>
                @forelse ($variant->articles()->get() as $article)
                <option value="{{route('article.show', ['article' => $article->id]) }}">{{$article->codeArticle}}</option>
                @empty
                 <p>Vide!</p>
                @endforelse
            </select>
            </td>
            <td>{{$variant->updated_at}}</td>
            <td>{{$variant->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
