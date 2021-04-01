  
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$modelePreparation->name}}
        </h2>
    </x-slot>

    
    <div class="container">           
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Code de conditionnement logistique</th>
            <th>Code d'article</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$modelePreparation->id}}</td>
            <td>{{$modelePreparation->conditionnementLogistiques->code}}</td>
            <td>{{$modelePreparation->conditionnementLogistiques->articles->codeArticle}}</td>
            <td>{{$modelePreparation->updated_at}}</td>
            <td>{{$modelePreparation->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
