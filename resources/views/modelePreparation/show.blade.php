  
  <x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du moéle de préparation  d'id {{$modelePreparation->id}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('modelePreparation.index')}}">Modeles de préparation</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>
    
    <div class="container">           
      <table class="table table-bordered">
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

    
