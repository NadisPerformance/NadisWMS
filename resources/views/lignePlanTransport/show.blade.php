  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails de la ligne de plan du transport du zone  '{{$lignePlanTransport->zone}}'
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('lignePlanTransport.index')}}">Lignes</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>

    
    <div class="container">           
      <table class="table table-bordered" >
        <thead>
          <tr>
            <th>Zone</th>
            <th>Code pays</th>
            <th>Code département</th>
            <th>Code postal</th>
          </tr>
        </thead>
        <tr>
          <td>{{$lignePlanTransport->zone}}</td>
          <td>{{$lignePlanTransport->codePaye}}</td>
          <td>{{$lignePlanTransport->codeDepartement}}</td>
          <td>{{$lignePlanTransport->codePostal}}</td>
        </tr>
        <thead>
          <tr>
            <th>Poids mini</th>
            <th>Poids maxi</th>
            <th>Nb colis mini</th>
            <th>Nb colis maxi</th>
          </tr>
        </thead>
        <tr>
          <td>{{$lignePlanTransport->poidsMin}}</td>
          <td>{{$lignePlanTransport->poidsMax}}</td>
          <td>{{$lignePlanTransport->nbColisMin}}</td>
          <td>{{$lignePlanTransport->nbColisMax}}</td>
        </tr>
        <thead>
          <tr>
            <th>Tarif</th>
            <th>Mode de calcul</th>
            <th>Unité de calcul</th>
            <th>Arrondi</th>
          </tr>
        </thead>
        <tr>
          <td>{{$lignePlanTransport->tarif}}</td>
          <td>{{$lignePlanTransport->modeCalcul}}</td>
          <td>{{$lignePlanTransport->uniteCalcul}}</td>
          <td>{{$lignePlanTransport->arrondi}}</td>
        </tr>
        <thead>
          <tr>
            <th>Plan de transport</th>
            <th>Transporteur</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <a class=""
              href="{{ route('planTransport.show', ['planTransport' => $lignePlanTransport->planTransports->id]) }}">
              {{$lignePlanTransport->planTransports->code}}</a>
            </td>           
            <td>
              <a class=""
              href="{{ route('transporteur.show', ['transporteur' => $lignePlanTransport->planTransports->transporteurs->id]) }}">
              {{$lignePlanTransport->planTransports->transporteurs->code}}</a>
            </td>
            <td>{{$lignePlanTransport->updated_at}}</td>
            <td>{{$lignePlanTransport->created_at}}</td>
          </tr>
        </tbody>
      </table>
    </div>
</x-app-layout>

    
