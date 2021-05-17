  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails d'emplacement du code : {{$emplacement->code}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('emplacement.index')}}">Emplacements</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>

    
    <div class="container">           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Libellé emplacement</th>
            <th>Libellé emplacement spécifique client</th>
            <th>Etat</th>
            <th>Type</th>
            <th>Usage</th>
          </tr>
        </thead>
          <tr>
            <td>{{$emplacement->id}}</td>
            <td>{{$emplacement->code}}</td>
            <td>{{$emplacement->Libelle}}</td>
            <td>{{$emplacement->LibelleClient}}</td>
            <td>{{$emplacement->etat}}</td>
            <td>{{$emplacement->type}}</td>
            <td>{{$emplacement->usage}}</td>
          </tr>
        <thead>
            <tr>
            <th>Capacité</th>
            <th>Hauteur</th>
            <th>Largeur</th>
            <th>Profondeur</th>
            <th>Poids</th>
            <th>Volume</th>
            <th>picking ?</th>
          </tr>
        </thead>
          <tr>
            <td>{{$emplacement->capacite}}</td>
            <td>{{$emplacement->hauteur}}</td>
            <td>{{$emplacement->largeur}}</td>
            <td>{{$emplacement->profondeur}}</td>
            <td>{{$emplacement->poids}}</td>
            <td>{{$emplacement->volume}}</td>
            <td>
              @if ($emplacement->estPicking==0)
                 Non 
              @else
                 Oui
              @endif
            </td>
          </tr>
        <thead>
          <tr>
            <th>updated_at</th>
            <th>created_at</th>
            <th>Magasin</th>
            <th>Secteur</th>
            <th>Famille Support</th>
          </tr>
        </thead>
        <tbody>
          <tr>
        <td>{{$emplacement->updated_at}}</td>
            <td>{{$emplacement->created_at}}</td>
            <td>
              <a class="btn btn-success btn-icon "
              href="{{ route('magasin.show', ['magasin' => $emplacement->magasins->id]) }}"> {{$emplacement->magasins->code}}</a>
            </td>
            <td>
              <a class="btn btn-success btn-icon "
              href="{{ route('secteur.show', ['secteur' => $emplacement->secteurs->id]) }}"> {{$emplacement->secteurs->code}}</a>
            </td>
            <td>
              <a class="btn btn-success btn-icon "
              href="{{ route('familleSupport.show', ['familleSupport' => $emplacement->familleSupports->id]) }}"> {{$emplacement->familleSupports->code}}</a>
            </td>
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
