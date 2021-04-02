  
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$modeleSN->id}}
        </h2>
    </x-slot>

    
    <div class="container">           
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Etat</th>
            <th>Libellé</th>
            <th>Nb de n° S/N attendus</th>
            <th>Séquence de relevé</th>
            <th>Règle de souplesse</th>
            <th>Code d'article</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$modeleSN->id}}</td>
            <td>{{$modeleSN->etat}}</td>
            <td>{{$modeleSN->Libelle}}</td>
            <td>{{$modeleSN->nbAttendus}}</td>
            <td>{{$modeleSN->sequenceReleve}}</td>
            <td>{{$modeleSN->regleSouplesse}}</td>
            <td>{{$modeleSN->articles->codeArticle}}</td>
            <td>{{$modeleSN->updated_at}}</td>
            <td>{{$modeleSN->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
