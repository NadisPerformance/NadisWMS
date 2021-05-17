  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du famille de support du code : {{$familleSupport->code}}
        </h2>


        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('familleSupport.index')}}">Familles de support</a></li>
          <li class="breadcrumb-item active">Détails</li>
      </ol>
    <div class="container">           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Libellé </th>
            <th>Etat</th>
            <th>Type</th>
            <th>Unité de réception</th>
            <th>Unité de stockage</th>
            <th>Unité de préparation</th>
            <th>Unité de expédition</th>
            <th>Unité de réapprovisionnement</th>
          </tr>
        </thead>
        <tr>
          <td>{{$familleSupport->id}}</td>
          <td>{{$familleSupport->code}}</td>
          <td>{{$familleSupport->Libelle}}</td>
          <td>{{$familleSupport->etat}}</td>
          <td>{{$familleSupport->type}}</td>
          <td>{{$familleSupport->uniteReception}}</td>
          <td>{{$familleSupport->uniteStockage}}</td>
          <td>{{$familleSupport->unitePreparation}}</td>
          <td>{{$familleSupport->uniteExpedition}}</td>
          <td>{{$familleSupport->uniteReapprovisionnement}}</td>
        </tr>
        <thead>
          <tr>
            <th>Profondeur</th>
            <th>Hauteur</th>
            <th>Largeur</th>
            <th>Poids</th>
            <th>Charge max</th>
            <th>Hauteur max</th>
            <th>updated_at</th>
            <th>created_at</th>
            <th>Emplacements</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            
            <td>{{$familleSupport->profondeur}}</td>
            <td>{{$familleSupport->hauteur}}</td>
            <td>{{$familleSupport->largeur}}</td>
            <td>{{$familleSupport->poids}}</td>
            <td>{{$familleSupport->chargeMax}}</td>
            <td>{{$familleSupport->hauteurMax}}</td>
            <td>{{$familleSupport->updated_at}}</td>
            <td>{{$familleSupport->created_at}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les code des emplacements</option>
                @forelse ($familleSupport->emplacements()->get() as $emplacement)
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

    
