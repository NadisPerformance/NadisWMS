  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du transporteur du code : {{$transporteur->code}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('transporteur.index')}}">Transporteurs</a></li>
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
            <th>N° SIRET</th>
          </tr>
        </thead>
        <tr>
          <td>{{$transporteur->code}}</td>
          <td>{{$transporteur->Libelle}}</td>
          <td>{{$transporteur->etat}}</td>
          <td>{{$transporteur->codeLangueDoc}}</td>
          <td>{{$transporteur->codeLangueData}}</td>
          <td>{{$transporteur->numSiret}}</td>
        </tr>
        <thead>
          <tr>
            
            <th>Les mouvements de réception</th>
            <th>Les mouvements internes</th>
            <th>Les mouvements d’expédition</th>
            <th>updated_at</th>
            <th>created_at</th>
            <th>plans du transport</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              @if ($transporteur->mouvementReception==0)
                NON
              @else
                OUI 
              @endif
            </td>
            <td>
              @if ($transporteur->mouvementInterne==0)
                NON
              @else
                OUI 
              @endif
            </td>
            <td>
              @if ($transporteur->mouvementExpedition==0)
                NON
              @else
                OUI 
              @endif
            </td>
            <td>{{$transporteur->updated_at}}</td>
            <td>{{$transporteur->created_at}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les codes des plans de ransports</option>
                @forelse ($transporteur->planTransports()->get() as $planTransport)
                <option value="{{ route('planTransport.show', ['planTransport' => $planTransport->id]) }}">{{$planTransport->code}}</option>
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

    
