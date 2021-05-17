  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails de la magasin du code: {{$magasin->code}}
        </h2>

        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('magasin.index')}}">Magasins</a></li>
          <li class="breadcrumb-item active">Détails</li>
      </ol>
    
    <div class="container">           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Libellé</th>
            <th>Etat</th>
            <th>Type</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tr>
          <td>{{$magasin->id}}</td>
          <td>{{$magasin->code}}</td>
          <td>{{$magasin->Libelle}}</td>
          <td>{{$magasin->etat}}</td>
          <td>{{$magasin->type}}</td>
          <td>{{$magasin->updated_at}}</td>
          <td>{{$magasin->created_at}}</td>
        </tr>  
        <thead>
          <tr>
            <th>Nombre des meubles</th>
            <th>Nombre des colonnes</th>
            <th>Nombre des niveaux</th>
            <th>Nombre des indices</th>
            <th>Séparateur</th>
            <th>Site</th>
            <th>Emplacements</th>
          </tr>
        </thead>
        <tr>
        <tbody>
          
            <td>{{$magasin->nombreMeubles}}</td>
            <td>{{$magasin->nombreColonnes}}</td>
            <td>{{$magasin->nombreNiveaux}}</td>
            <td>{{$magasin->nombreIndices}}</td>
            <td>{{$magasin->separateur}}</td>
            
            <td>
              <a class="btn btn-success btn-icon "
              href="{{ route('site.show', ['site' => $magasin->sites->id]) }}"> {{$magasin->sites->code}}</a>
            </td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les code des emplacements</option>
                @forelse ($magasin->emplacements()->get() as $emplacement)
                <option value="{{ route('emplacement.show', ['emplacement' => $emplacement->id]) }}">{{$emplacement->code}}</option>
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

    
