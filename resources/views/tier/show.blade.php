  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails d'tier du code : {{$tier->code}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('tier.index')}}">Tiers</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>

    
    <div class="container">           
      <table class="table table-bordered" >
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Libellé</th>
            <th>Information</th>
            <th>Site</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$tier->id}}</td>
            <td>{{$tier->code}}</td>
            <td>{{$tier->Libelle}}</td>
            <td>{{$tier->information}}</td>
            <td>
              <a class="btn btn-success btn-icon "
              href="{{ route('site.show', ['site' => $tier->sites->id]) }}"> {{$tier->sites->code}}</a>
            </td> 
            <td>{{$tier->updated_at}}</td>
            <td>{{$tier->created_at}}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
