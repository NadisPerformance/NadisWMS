  
  <x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails de modele de stockage d'id : {{$modeleStockage->id}}
        </h2>
   

    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{route('modeleStockage.index')}}">Modéles de stockage</a></li>
      <li class="breadcrumb-item active">Détails</li>
    </ol>


<div class="container">           
  <table class="table table-bordered" >
        <thead>
          <tr>
            <th>ID</th>

            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$modeleStockage->id}}</td>

            <td>{{$modeleStockage->updated_at}}</td>
            <td>{{$modeleStockage->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
