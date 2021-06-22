<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800  bg-secondary">
        {{ __('msg.Gestion de stocke') }}
    </h2>
    
    <div class="container">
        <div class="row">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-jet-label for="idArticle" value="{{ __('Article') }}" />
                                <select id="idArticle" name="idArticle"  class="form-select"
                                    aria-label="Default select example"
                                    onchange="Affiche()">
                                    <option   value="">Choisi le code d'article</option> 
                                    @forelse ($articles as $article)
                                    <option   value="{{$article->id}}">{{$article->codeArticle}}</option> 
                                    @empty
                                      vide  
                                    @endforelse                                      
                                </select>
                            </div>
                            @forelse ($articles as $article)
                            <div style="display: none" class="form-group" value="{{$article->id}}" id="{{$article->id}}">
                                <div class="col-lg">
                                    <div class="card mb">
                                        <div class="card-header">
                                            <i class="fas fa-chart-pie mr-1"></i>
                                            {{ $article->libelle}}
                                        </div>
                                        <div class="card-body">
                                            @if ($article->emplacement!=null)
                                            <table class="table">
                                            @foreach ($article->emplacement()->get() as $emplacement)
                                                <tr>
                                                    <th scope="col">Site :</th>
                                                    <td>
                                                    <a href="{{ route('site.show', ['site' => $emplacement->magasins->sites->id]) }}"> 
                                                    {{$emplacement->magasins->sites->Libelle}}
                                                    </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Magasin :</th>
                                                    <td>
                                                    <a href="{{ route('magasin.show', ['magasin' => $emplacement->magasins->id]) }}"> 
                                                    {{$emplacement->magasins->Libelle}}
                                                    </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Emplacement :</th>
                                                    <td>
                                                    <a href="{{ route('emplacement.show', ['emplacement' => $emplacement->id]) }}"> 
                                                    {{$emplacement->Libelle}}
                                                    </a>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Societé :</th>
                                                    <td>
                                                    <a href="{{ route('societe.show', ['societe' => $article->societes->id]) }}"> 
                                                    {{$article->societes->id}}
                                                    </a>
                                                </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th scope="col">Lot d'entree :</th>
                                                    @if($article->lotsEntree==0)
                                                    <td>NON</td>
                                                    @else
                                                    <td>OUI</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="col">Lot de sortie:</th>
                                                    @if($article->lotsSortie==0)
                                                    <td>NON</td>
                                                    @else
                                                    <td>OUI</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="col">dateLV :</th>
                                                    @if($article->dateLV==null)
                                                    <td>Vide</td>
                                                    @else
                                                    <td>{{$article->dateLV}}</td>                                                    
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="col">S/N :</th>
                                                    @if($article->numModelisationSN==null)
                                                    <td>Vide</td>
                                                    @else
                                                    <td>{{$article->numModelisationSN}}</td>                                                    
                                                    @endif
                                                </tr>
                                            @endforeach
                                            </table>
                                            @else
                                            Vide
                                            @endif
                                        </div>
                                        <div class="card-footer small text-muted">{{ __('msg.mis') }} {{$article->updated_at}}</div>
                                    </div>
                                </div>
                            
                            </div>
                            @empty
                            vide  
                            @endforelse 
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script>
        function Affiche()
   {
    id=document.getElementById('idArticle').value;

    @foreach ($ids as $d)
    if({{$d->id}}==id){
        document.getElementById({{$d->id}}).style.display ='block';
    }else{
        document.getElementById({{$d->id}}).style.display ='none';
    }
    
    @endforeach
   }
   
       </script>
</x-app-layout>