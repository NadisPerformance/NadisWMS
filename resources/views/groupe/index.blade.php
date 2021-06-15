<x-app-layout>
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Liste des groupes') }}
  </h2>
  @if (session('msge'))
  <h3 style="color: rgb(252, 75, 21)">
      {{ session()->get('msge') }}
  </h3>
  @endif
 @if (session('msg'))
  <h3 style="color: green">
      {{ session()->get('msg') }}
  </h3>
  @endif
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Groupes</li>
    <li class="breadcrumb-item active">
        <button><a href="{{route('downloadPDF')}}">
          {{ __('msg.telecharger') }}
        </a></button>
      </li>
</ol> 
<div class="container" style="margin-top: 2%">
  <form action="{{ route('actionGroupe') }}" method="GET">
  @csrf
  <div class="col-lg">
      <div class="card mb">
          <div class="card-header">
              <button>
                  <a class="btn btn-success btn-icon " href="{{ route('groupe.create') }}">Ajouter</a>
              </button>
              <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                      onClick="return confirm('Supprimer  !? ')"> Supprimer
              </button>
          </div>
          <div class="card-body" >
             
              <div class="row">
                  <div class="col-lg-12">
                      <div class="main-box clearfix">
                          <div class="table-responsive">
                              <table class="table groupe-list" id="table">
                                  <thead>
                                      <tr>
                                          <th><input type="checkbox" onclick="checkAll(this)"></th>
                                          <th><span>{{__('ID')}}</span></th>
                                          <th><span>{{__('Libelle')}}</span></th>
                                          <th>&nbsp;</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @forelse ($groupes as $groupe)
                                      <tr>
                                          <td><input type="checkbox" name="{{ $groupe->id }}" value="{{ $groupe->id }}"></td>
                                          <td>{{ $groupe->id }}</td>
                                          <td>{{ $groupe->Libelle }}</td>

                                          
                                          <td style="width: 20%;">
                                                  <button title="Détails" >
                                                      <a class="btn btn-primary " href="{{ route('groupe.show', ['groupe' => $groupe->id]) }}">
                                                        +
                                                        </a>
                                                  </button>
                      
                                                  <button  class="btn btn-warning ">
                                                      
                                                      <a title="Modifier le groupe  {{ $groupe->name }}" href="{{ route('groupe.edit', ['groupe' => $groupe->id]) }}">
                                                          <i class="fa fa-edit"></i>{{__('Edit')}}
                                                      </a>
                              
                                                  </button>
                                                  <form style="display: inline;"></form>
                                                          
                                                          <form style="display: inline;" action="{{ route('groupe.destroy', ['groupe' => $groupe->id]) }}"
                                                              method="POST">
                                                              @csrf
                                                              @method('DELETE')
                                                              <button type="input" name="submit" class="btn btn-danger" title="Supprimer le groupe  {{ $groupe->Libelle }}"
                                                                  onClick="return confirm('Supprimer {{ $groupe->Libelle }}  ')">
                                                                  <i class="fa fa-trash"></i>
                                                              </button>
                                                          </form>
                                                         
                                                        
                                          </td>
                                      </tr>
                                      @empty
                              <p>Vide!</p>
                          @endforelse
                                  </tbody>
                              </table>
                          </div>    
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</form>
</div>
</x-app-layout>
