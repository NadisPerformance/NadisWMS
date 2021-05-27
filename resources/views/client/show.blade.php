  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du client du code : {{$client->code}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('client.index')}}">Clients</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>

    
    <div class="container">           
      <table class="table table-bordered" >
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Libellé</th>
            <th>État</th>
            <th>Type</th>
            <th>Code langue doc</th>
            <th>Code langue data</th>
          </tr>
        </thead>
        <tr>
          <td>{{$client->id}}</td>
          <td>{{$client->code}}</td>
          <td>{{$client->Libelle}}</td>
          <td>{{$client->etat}}</td>
          <td>{{$client->type}}</td>
          <td>{{$client->codeLangueDoc}}</td>
          <td>{{$client->codeLangueData}}</td>
        </tr>
        <thead>
          <tr>
            <th>N° SIRET</th>
            <th>Contrat date</th>
            <th>Expédition partielle</th>
            <th>Regroupement logique</th>
            <th>updated_at</th>
            <th>created_at</th>
            <th>Adresses</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$client->numSiret}}</td>
            <td>{{$client->contraDate}}</td>
            <td>{{$client->expeditionPartielle}}</td>
            <td>{{$client->regroupementLogique}}</td>
            <td>{{$client->updated_at}}</td>
            <td>{{$client->created_at}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les livraisons des adresses</option>
                @forelse ($client->adresses()->get() as $adresse)
                <option value="{{ route('adresse.show', ['adresse' => $adresse->id]) }}">{{$adresse->livraison}}</option>
                @empty
                 <option value="">Vide</option>
                @endforelse
            </select>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</x-app-layout>

    
