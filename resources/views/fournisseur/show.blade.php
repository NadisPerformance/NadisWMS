  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du fournisseur du code : {{$fournisseur->code}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('fournisseur.index')}}">Fournisseurs</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>

    
    <div class="container">           
      <table class="table table-bordered" >
        <thead>
          <tr>
            <th>Code</th>
            <th>Libellé</th>
            <th>État</th>
            <th>Code langue doc</th>
            <th>Code langue data</th>
          </tr>
        </thead>
        <tr>
          <td>{{$fournisseur->code}}</td>
          <td>{{$fournisseur->Libelle}}</td>
          <td>{{$fournisseur->etat}}</td>
          <td>{{$fournisseur->codeLangueDoc}}</td>
          <td>{{$fournisseur->codeLangueData}}</td>
        </tr>
        <thead>
          <tr>
            <th>N° SIRET</th>
            <th>Contrat date</th>
            <th>updated_at</th>
            <th>created_at</th>
            <th>Adresses</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$fournisseur->numSiret}}</td>
            <td>{{$fournisseur->contraDate}}</td>
            <td>{{$fournisseur->updated_at}}</td>
            <td>{{$fournisseur->created_at}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les livraisons des adresses</option>
                @forelse ($fournisseur->adresses()->get() as $adresse)
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

    
