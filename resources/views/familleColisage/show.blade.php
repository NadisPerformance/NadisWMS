  
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$familleColisage->name}}
        </h2>
    </x-slot>

    
    <div class="container">           
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Code</th>
            <th>Etat</th>
            <th>Type</th>
            <th>Libellé</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$familleColisage->id}}</td>
            <td>{{$familleColisage->name}}</td>
            <td>{{$familleColisage->code}}</td>
            <td>{{$familleColisage->etat}}</td>
            <td>{{$familleColisage->type}}</td>
            <td>{{$familleColisage->Libelle}}</td>
            <td>{{$familleColisage->updated_at}}</td>
            <td>{{$familleColisage->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
