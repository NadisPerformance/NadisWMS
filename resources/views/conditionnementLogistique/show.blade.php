  
  <x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du conditionnement logistique du code : {{$conditionnementLogistique->code}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('conditionnementLogistique.index')}}">Conditionnements logistiques</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>
    
    <div class="container">           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Etat</th>
            <th>Type</th>
            <th>Code d'article</th>
            <th>Libellé</th>
            <th>updated_at</th>
            <th>created_at</th>
            <th>Code à Barre</th>
            <th>Modéle de préparation</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$conditionnementLogistique->id}}</td>
            <td>{{$conditionnementLogistique->code}}</td>
            <td>{{$conditionnementLogistique->etat}}</td>
            <td>{{$conditionnementLogistique->type}}</td>
            <td>{{$conditionnementLogistique->articles->codeArticle}}</td>
            <td>{{$conditionnementLogistique->Libelle}}</td>
            <td>{{$conditionnementLogistique->updated_at}}</td>
            <td>{{$conditionnementLogistique->created_at}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les values des Codes à Barre</option>
                @forelse ($conditionnementLogistique->codeBarres()->get()  as $cb)
                <option value="{{ route('codeBarre.show', ['codeBarre' => $cb->id]) }}">{{$cb->value}}</option>
                @empty
                 <p>Vide!</p>
                @endforelse
            </select>
            </td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les modéles de préparation</option>
                @forelse ($conditionnementLogistique->modelePreparations()->get() as $mp)
                <option value="{{ route('modelePreparation.show', ['modelePreparation' => $mp->id]) }}">{{$mp->id}}</option>
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

    
