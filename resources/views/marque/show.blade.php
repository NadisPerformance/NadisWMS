  
  <x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails de la marque {{$marque->name}}
        </h2>
 <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{route('marque.index')}}">Marques</a></li>
      <li class="breadcrumb-item active">Détails</li>
  </ol> 

    
    <div class="container">           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$marque->id}}</td>
            <td>{{$marque->name}}</td>
            <td>{{$marque->discription}}</td>
            <td>{{$marque->updated_at}}</td>
            <td>{{$marque->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
