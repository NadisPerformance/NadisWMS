  
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$conditionnementLogistique->code}} 
        </h2>
    </x-slot>

    
    <div class="container">           
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Etat</th>
            <th>Type</th>
            <th>Code d'article</th>
            <th>Libellé</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$conditionnementLogistique->id}}</td>
            <td>{{$conditionnementLogistique->code}}</td>
            <td>{{$conditionnementLogistique->etat}}</td>
            <td>{{$conditionnementLogistique->type}}</td>
            <td>{{$conditionnementLogistique->articles->codeArticle}}</td>
            <td>{{$conditionnementLogistique->Libelle}}</td>
            <td>{{$conditionnementLogistique->updated_at}}</td>
            <td>{{$conditionnementLogistique->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
