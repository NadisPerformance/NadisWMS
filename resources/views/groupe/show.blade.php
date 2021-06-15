  
  <x-app-layout>
  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails de groupe du code : {{$groupe->code}}
        </h2>


    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{route('groupe.index')}}">groupes</a></li>
      <li class="breadcrumb-item active">Détails</li>
    </ol>


<div class="container">           
  <table class="table table-bordered" >
        <thead>
          <tr>
            <th>{{__('Libellé')}}</th>
            <th>{{__('Code')}}</th>
            <th>{{__('Etat')}}</th>
            <th>{{__('Users')}}</th>
            <th>{{__('updated_at')}}</th>
            <th>{{__('created_at')}}</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$groupe->Libelle}}</td>
            <td>{{$groupe->code}}</td>
            <td>{{$groupe->etat}}</td>
            <td>
              <a class=""
              href="{{ route('user.show', ['user' => $groupe->users->id]) }}">
              {{$groupe->users->name}}</a>
            </td>
            <td>{{$groupe->updated_at}}</td>
            <td>{{$groupe->created_at}}</td>
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
