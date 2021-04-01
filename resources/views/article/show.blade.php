  
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$article->codeArticle}}
        </h2>
    </x-slot>

    
    <div class="container">           
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Societé gestionnaire</th>
            <th>Etat</th>
            <th>Date de contrat</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->codeArticle}}</td>
            <td>{{$article->steGestionnaire}}</td>
            <td>{{$article->etat}}</td>
            <td>{{$article->dateContrat}}</td>
            <td>{{$article->updated_at}}</td>
            <td>{{$article->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
