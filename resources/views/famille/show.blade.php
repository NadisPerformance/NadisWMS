  
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$famille->name}}
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
            <td>{{$famille->id}}</td>
            <td>{{$famille->name}}</td>
            <td>{{$famille->code}}</td>
            <td>{{$famille->etat}}</td>
            <td>{{$famille->type}}</td>
            <td>{{$famille->Libelle}}</td>
            <td>{{$famille->updated_at}}</td>
            <td>{{$famille->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
