  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails d'adresse de livraison : {{$adresse->livraison}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('adresse.index')}}">Adresses</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>

    
    <div class="container">           
      <table class="table table-bordered" >
        <thead>
          <tr>
            <th>ID</th>
            <th>Livraison</th>
            <th>Siege</th>
            <th>Facturation</th>
            <th>CP</th>
            <th>Ville</th>
            <th>Pays</th>
            <th>Raison sociale</th>
            <th>Site internet</th>
            <th>updated_at</th>
            <th>created_at</th>
            <th>Personne référent</th>
            <th>Code du site</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$adresse->id}}</td>
            <td>{{$adresse->livraison}}</td>
            <td>{{$adresse->siege}}</td>
            <td>{{$adresse->facturation}}</td>
            <td>{{$adresse->CP}}</td>
            <td>{{$adresse->Ville}}</td>
            <td>{{$adresse->pays}}</td>
            <td>{{$adresse->raisonSociale}}</td>
            <td>{{$adresse->siteInternet}}</td>
            <td>{{$adresse->updated_at}}</td>
            <td>{{$adresse->created_at}}</td>
            <td>{{$adresse->users->name}}</td>
            <td>
              <a class="btn btn-success btn-icon "
              href="{{ route('site.show', ['site' => $adresse->sites->id]) }}"> {{$adresse->sites->code}}</a>
            </td>
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
