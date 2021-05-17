<x-app-layout>

   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'tier du code {{$tier->code}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
  
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('tier.index')}}">Tiers</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('tier.update', ['tier' => $tier->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Code tiers" id="code" class="block mt-1 w-full" type="text"
                                        name="code" value="{{old('code',$tier->code)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-input placeholder="Libellé" id="Libelle" class="block mt-1 w-full" type="text"
                                        name="Libelle" value="{{old('Libelle',$tier->Libelle)}}" required  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-jet-label for="idSite" value="{{ __('Site') }}" />
                                    <select name="idSite"  class="form-select"
                                        aria-label="Default select example">
                                        @forelse ($sites as $site)
                                        <option value="{{$site->id}}"
                                            {{(old('idSite',$tier->idSite)==$site->id)? 'selected':''}}>
                                            {{$site->code}}
                                        </option> 
                                        @empty
                                          vide  
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-label for="information" value="{{ __('Information') }}" />
                                    <textarea class="form-control" id="information" rows="5" type="textarea" name="information"
                                    value="" required>{{old('information',$tier->information)}}</textarea>
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
