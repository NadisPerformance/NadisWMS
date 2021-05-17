  
  <x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails de la famille du code {{$familleSN->code}}
        </h2>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('familleSN.index')}}">Familles</a></li>
          <li class="breadcrumb-item active">Détails</li>
      </ol> 
    
    <div class="container">           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Code</th>
            <th>Type attendu</th>
            <th>Longueur</th>
            <th>Fixe</th>
            <th>Taille maxi</th>
            <th>Type caractère</th>
            <th>Alphanumérique</th>
          </tr>
        </thead>
        <tr>
          <td>{{$familleSN->code}}</td>
            <td>{{$familleSN->type}}</td>
            <td>{{$familleSN->longueur}}</td>
            <td>{{$familleSN->fixe}}</td>
            <td>{{$familleSN->tailleMax}}</td>
            <td>{{$familleSN->typeCaractere}}</td>
            <td>{{$familleSN->alphanumerique}}</td>
        </tr>
        <thead>
          <tr>
            <th>Numérique</th>
            <th>Valeur préfixe</th>
            <th>Valeur suffixe</th>
            <th>Type Check digit</th>
            <th>Lignes</th>
            <th>updated_at</th>
            <th>created_at</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$familleSN->numerique}}</td>
            <td>{{$familleSN->prefixe}}</td>
            <td>{{$familleSN->suffixe}}</td>
            <td>{{$familleSN->typeCheckdigit}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les n° des lignes</option>
                @forelse ($familleSN->lignes()->get() as $ligne)
                <option value="{{ route('ligneModeleSN.show', ['ligneModeleSN' => $ligne->id]) }}">{{$ligne->nombre}}</option>
                @empty
                 <option value="">Vide</option>
                @endforelse
            </select>
            </td>
            <td>{{$familleSN->updated_at}}</td>
            <td>{{$familleSN->created_at}}</td>
            
            
          </tr>
          
        </tbody>
      </table>
    </div>
</x-app-layout>

    
