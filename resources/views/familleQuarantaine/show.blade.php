  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails la famille de quarantaine d'id : {{$familleQuarantaine->id}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('familleQuarantaine.index')}}">Familles de quarantaine</a></li>
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
            <td>{{$familleQuarantaine->id}}</td>

            <td>{{$familleQuarantaine->updated_at}}</td>
            <td>{{$familleQuarantaine->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
