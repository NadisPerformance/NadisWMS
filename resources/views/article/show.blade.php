  
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$article->codeArticle}}
        </h2>
    </x-slot>

    
    <div class="container">           
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Societé gestionnaire</th>
            <th>Etat</th>
            <th>Date de contrat</th>
            <th>updated_at</th>
            <th>created_at</th>
            <th>Conditionnement logistique</th>
            <th>Familles</th>
            <th>Familles de colisage</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->codeArticle}}</td>
            <td>{{$article->steGestionnaire}}</td>
            <td>{{$article->etat}}</td>
            <td>{{$article->dateContrat}}</td>
            <td>{{$article->updated_at}}</td>
            <td>{{$article->created_at}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les code des conditionnements</option>
                @forelse ($cls as $cl)
                <option value="{{ route('conditionnementLogistique.show', ['conditionnementLogistique' => $cl->id]) }}">{{$cl->code}}</option>
                @empty
                 <p>Vide!</p>
                @endforelse
            </select>
            </td>
            <td>
              <a href="{{ route('famille.show', ['famille' => $article->familles->id]) }}">{{$article->familles->name}}</a>
            </td>
            <td>
              <a href="{{ route('familleColisage.show', ['familleColisage' => $article->familleColisages->id]) }}">{{$article->familleColisages->name}}</a>
            </td>
          </tr>
          
        </tbody>
      </table>
      
    </div>
</x-app-layout>

    
