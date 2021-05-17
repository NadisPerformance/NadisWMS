  
  <x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails du site du code :  {{$site->code}}
        </h2>


        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('site.index')}}">Sites</a></li>
          <li class="breadcrumb-item active">Détails</li>
        </ol>
    <div class="container">           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Libellé</th>
            <th>Etat</th>
            <th>Défaut</th>
            <th>Code langue document</th>
            <th>Code langue data</th>
            <th>updated_at</th>
            <th>created_at</th>
            <th>Magasins</th>
            <th>Adresses</th>
            <th>Contactes</th>
            <th>Tiers</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$site->id}}</td>
            <td>{{$site->code}}</td>
            <td>{{$site->Libelle}}</td>
            <td>{{$site->etat}}</td>
            @if ($site->defaut==0)
            <td>Non</td>  
            @else
            <td>Oui</td>     
            @endif
            <td>{{$site->codeLangueDocument}}</td>
            <td>{{$site->codeLangueData}}</td>
            <td>{{$site->updated_at}}</td>
            <td>{{$site->created_at}}</td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les code des magasins</option>
                @forelse ($site->magasins()->get() as $magasin)
                <option value="{{route('magasin.show', ['magasin' => $magasin->id]) }}">{{$magasin->code}}</option>
                @empty
                 <p>Vide!</p>
                @endforelse
            </select>
            </td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les adresses</option>
                @forelse ($site->adresses()->get() as $adresse)
                <option value="{{ route('adresse.show', ['adresse' => $adresse->id]) }}">{{$adresse->id}}</option>
                @empty
                 <p>Vide!</p>
                @endforelse
            </select>
            </td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les contactes</option>
                @forelse ($site->contactes()->get() as $contacte)
                <option value="{{ route('contacte.show', ['contacte' => $contacte->id]) }}">{{$contacte->id}}</option>
                @empty
                 <p>Vide!</p>
                @endforelse
            </select>
            </td>
            <td>
              <select name="etat"  class="form-select" onChange="location = this.options[this.selectedIndex].value;">
                <option value="#" selected>Les code des tiers</option>
                @forelse ($site->tiers()->get() as $tier)
                <option value="{{ route('tier.show', ['tier' => $tier->id]) }}">{{$tier->code}}</option>
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

    
