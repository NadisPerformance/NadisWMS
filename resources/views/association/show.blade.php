  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails de la association du prestation  '{{$association->prestation}}'
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('association.index')}}">Associations</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>

    
    <div class="container">           
      <table class="table table-bordered" >
        <thead>
          <tr>
            <th>Code société</th>
            <th>Code transporteur</th>
            <th>Type</th>
            <th>Prestation</th>
            <th>N° compte de la société chez le transporteur</th>
            <th>Plage colis</th>
            <th>Code interne</th>
          </tr>
        </thead>
        <tr>
          <td>
            <a class="btn btn-success btn-icon "
            href="{{ route('societe.show', ['societe' => $association->societes->id]) }}">
            {{$association->societes->id}}</a>
          </td>          
          <td>
            <a class=""
            href="{{ route('transporteur.show', ['transporteur' => $association->transporteurs->id]) }}">
            {{$association->transporteurs->code}}</a>
          </td>
          <td>{{$association->type}}</td>
          <td>{{$association->prestation}}</td>
          <td>{{$association->numCompte}}</td>
          <td>{{$association->plageColis}}</td>
          <td>{{$association->codeInterne}}</td>
        </tr>
        <thead>
          <tr>
            
            <th>Palettisation obligatoire</th>
            <th>Echange EDI</th>
            <th>Impression CN23 (pour la douane)</th>
            <th>Association par défaut</th>
            <th>Association à optimiser</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              @if ($association->palettisation==0)
                NON
              @else
                OUI 
              @endif
            </td>
            <td>
              @if ($association->echangeEDI==0)
                NON
              @else
                OUI 
              @endif
            </td>
            <td>
              @if ($association->impressionCN23==0)
                NON
              @else
                OUI 
              @endif
            </td>
            <td>
              @if ($association->transporteurParDefaut==0)
                NON
              @else
                OUI 
              @endif
            </td>
            <td>
              @if ($association->transporteurOptimiser==0)
                NON
              @else
                OUI 
              @endif
            </td>
            <td>{{$association->updated_at}}</td>
            <td>{{$association->created_at}}</td>
          </tr>
        </tbody>
      </table>
    </div>
</x-app-layout>

    
