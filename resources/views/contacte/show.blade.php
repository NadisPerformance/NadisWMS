  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails d'contacte d'id : {{$contacte->id}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('contacte.index')}}">Contactes</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>

    
    <div class="container">           
      <table class="table table-bordered" >
        <thead>
          <tr>
            <th>ID</th>
            <th>Responsable société</th>
            <th>Chef d’équipe</th>
            <th>Personne référent</th>
            <th>Site</th>
            <th>updated_at</th>
            <th>created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$contacte->id}}</td>
            <td>{{$contacte->responsableSociete}}</td>
            <td>{{$contacte->chefEquipe}}</td>
            <td>{{$contacte->users->name}}</td>
            <td>
              <a class="btn btn-success btn-icon "
              href="{{ route('site.show', ['site' => $contacte->sites->id]) }}"> {{$contacte->sites->code}}</a>
            </td> 
            <td>{{$contacte->updated_at}}</td>
            <td>{{$contacte->created_at}}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
