<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le transporteur du code  {{$transporteur->code}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('transporteur.index')}}">Transporteurs</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('transporteur.update', ['transporteur' => $transporteur->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code" id="code" class="block mt-1 w-full" type="number"
                                        name="code" value="{{old('code',$transporteur->code)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <x-jet-input placeholder="Libellé secteur" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle',$transporteur->Libelle)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="etat" value="{{ __('État') }}" />
                                    <select name="etat"  class="form-select"
                                        aria-label="Default select example">
                                        <option value="Actif"{{(old('etat',$transporteur->etat)=='Actif')? 'selected':''}}>Actif</option>
                                        <option value="Inactif"{{(old('etat',$transporteur->etat)=='Inactif')? 'selected':''}}>Inactif</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code langue doc" id="codeLangueDoc" class="block mt-1 w-full" type="number"
                                        name="codeLangueDoc" value="{{old('codeLangueDoc',$transporteur->codeLangueDoc)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code langue data" id="codeLangueData" class="block mt-1 w-full" type="number"
                                        name="codeLangueData" value="{{old('codeLangueData',$transporteur->codeLangueData)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="N° SIRET" id="numSiret" class="block mt-1 w-full" type="number"
                                        name="numSiret" value="{{old('numSiret',$transporteur->numSiret)}}" required  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 @if(old('mouvementReception',$transporteur->mouvementReception ?? null)==1) checked @endif
                                    class="form-check-input" name="mouvementReception" type="checkbox" id="mouvementReception">
                                    <label class="form-check-label" for="mouvementReception">Les mouvements de réception</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 @if(old('mouvementInterne',$transporteur->mouvementInterne ?? null)==1) checked @endif
                                     class="form-check-input" name="mouvementInterne" type="checkbox" id="mouvementInterne">
                                    <label class="form-check-label" for="mouvementInterne">Les mouvements internes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input value=1 @if(old('mouvementExpedition',$transporteur->mouvementExpedition ?? null)==1) checked @endif
                                     class="form-check-input" name="mouvementExpedition" type="checkbox" id="mouvementExpedition">
                                    <label class="form-check-label" for="mouvementExpedition">Les mouvements d’expédition</label>
                                </div>
                            </div>
                               
                        </div>

                    </div>
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $err)

                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    @endif



                    <div class="modal-footer">
                        <input type="hidden" name="isEmpty" value="">
                        <button type="input" name="submit" value="newAccount" class="btn btn-success btn-icon"><i
                                class="fa fa-check"></i> Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
