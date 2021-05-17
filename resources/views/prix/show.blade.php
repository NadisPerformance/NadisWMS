  
  <x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du prix d'id {{$prix->id}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('prix.index')}}">Prixs</a></li>
          <li class="breadcrumb-item active">Détails</li>
      </ol> 
    
    <div class="container">           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>

            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$prix->id}}</td>

            <td>{{$prix->updated_at}}</td>
            <td>{{$prix->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
