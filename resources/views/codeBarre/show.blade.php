  
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$codeBarre->name}}
        </h2>
    </x-slot>

    
    <div class="container">           
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Value</th>
            <th>Code de conditionnement logistique</th>
            <th>Code d'article</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$codeBarre->id}}</td>
            <td>{{$codeBarre->value}}</td>
            <td>{{$codeBarre->conditionnementLogistiques->code}}</td>
            <td>{{$codeBarre->conditionnementLogistiques->articles->codeArticle}}</td>
            <td>{{$codeBarre->updated_at}}</td>
            <td>{{$codeBarre->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
