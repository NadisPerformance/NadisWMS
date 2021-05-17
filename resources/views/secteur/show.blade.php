  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du secteur du code : {{$secteur->code}}
        </h2>


        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('secteur.index')}}">Secteurs</a></li>
          <li class="breadcrumb-item active">Détails</li>
      </ol>
    <div class="container">           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Libellé </th>
            <th>Etat</th>
            <th>Type</th>
            <th>updated_at</th>
            <th>created_at</th>
            <th>Emplacements</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$secteur->id}}</td>
            <td>{{$secteur->code}}</td>
            <td>{{$secteur->Libelle}}</td>
            <td>{{$secteur->etat}}</td>
            <td>{{$secteur->type}}</td>
            <td>{{$secteur->updated_at}}</td>
            <td>{{$secteur->created_at}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les code des emplacements</option>
                @forelse ($secteur->emplacements()->get() as $emplacement)
                <option value="{{ route('emplacement.show', ['emplacement' => $emplacement->id]) }}">{{$emplacement->code}}</option>
                @empty
                 <p>Vide!</p>
                @endforelse
            </select>
            </td>
              
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
