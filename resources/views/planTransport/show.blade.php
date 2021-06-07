  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du plan de transport du code  {{$planTransport->code}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('planTransport.index')}}">Plans des transports</a></li>
          <li class="breadcrumb-item active">Détails</li>
          <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
            <option value="#" selected>Les lignes</option>
            @forelse ($planTransport->lignePlanTransports()->get() as $ligne)
            <option value="{{ route('lignePlanTransport.show', ['lignePlanTransport' => $ligne->id]) }}">{{$ligne->zone}}</option>
            @empty
             <p>Vide!</p>
            @endforelse
        </select>
        </ol>

    
    <div class="container">           
      <table class="table table-bordered" >
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Libellé</th>
            <th>Pays</th>
          </tr>
        </thead>
        <tr>
          <td>{{$planTransport->id}}</td>
          <td>{{$planTransport->code}}</td>
          <td>{{$planTransport->Libelle}}</td>
          <td>{{$planTransport->pays}}</td>
        </tr>
        <thead>
          <tr>
            <th>État</th>
            <th>Type</th>
            <th>Mode de recherche</th>
            <th>Mode de calcul du montant de transport</th>
          </tr>
        </thead>
        <tr>
          <td>{{$planTransport->etat}}</td>
          <td>{{$planTransport->type}}</td>
          <td>{{$planTransport->modeRecherche}}</td>
          <td>{{$planTransport->modeCalcul}}</td>
        </tr>
        <thead>
          <tr>
            <th>Taxe gazole</th>
            <th>Taxe sureté</th>
            <th>L’écotaxe </th>
            <th>Transporteur</th>
          </tr>
        </thead>
        <tr>
          <td>{{$planTransport->taxeGazole}}</td>
          <td>{{$planTransport->taxeSurete}}</td>
          <td>{{$planTransport->ecotaxe}}</td>
          <td>
            <a class=""
            href="{{ route('transporteur.show', ['transporteur' => $planTransport->transporteurs->id]) }}">
            {{$planTransport->transporteurs->code}}</a>
          </td>
        </tr>
        <thead>
          <tr>
            <th>Dates de début de validité</th>
            <th>Dates de fin de validité</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$planTransport->dateDebutValidite}}</td>
            <td>{{$planTransport->dateFinValidite}}</td>
            <td>{{$planTransport->updated_at}}</td>
            <td>{{$planTransport->created_at}}</td>
          </tr>
        </tbody>
      </table>
    </div>
</x-app-layout>

    
