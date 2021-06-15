<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Liste des users') }}
    </h2>
    @if (session('msg'))
    <h3 style="color: green">
        {{ session()->get('msg') }}
    </h3>
    @endif

 <div class="container" style="margin-top: 2%">
    <form action="{{ route('actionUser') }}" method="GET">
    @csrf
    <div class="col-lg">
        <div class="card mb">
            <div class="card-header">
                <button>
                    <a class="btn btn-success btn-icon " href="{{ route('user.create') }}">Ajouter</a>
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
                                <table class="table user-list" id="table">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" onclick="checkAll(this)"></th>
                                            <th><span>{{__('msg.Users')}}</span></th>
                                            <th><span>{{__('Created')}}</span></th>
                                            <th class="text-center"><span>{{__('Status')}}</span></th>
                                            <th><span>{{__('Email')}}</span></th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                        <tr>
                                            <td>
                                                @if (Auth::user()->type=="Intégrateur")
                                                @if ($user->type!="Editeur")
                                                <input type="checkbox" name="{{ $user->id }}" value="{{ $user->id }}">
                                                @endif
                                                    
                                                @else
                                                <input type="checkbox" name="{{ $user->id }}" value="{{ $user->id }}">
                                                @endif
                                                
                                            </td>
                                            <td>
                                                <img src="{{ $user->profile_photo_url }}" alt="">
                                                <a href="#" class="user-link">{{ $user->name }}</a>
                                                <span class="user-subhead">{{ $user->type }}</span>
                                            </td>
                                            <td>
                                                {{ $user->created_at }}
                                            </td>
                                            <td class="text-center">
                                                @if ( $user->etat =='Actif' )
                                                <span class="label bg-success">{{ $user->etat }}</span>
                                                @else
                                                <span class="label bg-danger">{{ $user->etat }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#">{{ $user->email }}</a>
                                            </td>
                                            <td style="width: 20%;">
                                                    <button title="Détails" >
                                                        <a class="btn btn-primary " href="{{ route('user.show', ['user' => $user->id]) }}">
                                                          +
                                                          </a>
                                                    </button>

                                                    @if (Auth::user()->type=="Intégrateur")
                                                    @if ($user->type!="Editeur")
                                                    <button  class="btn btn-warning ">
                                                        
                                                        <a title="Modifier user  {{ $user->name }}" href="{{ route('user.edit', ['user' => $user->id]) }}">
                                                            <i class="fa fa-edit"></i>{{__('Edit')}}
                                                        </a>
                                
                                                    </button>
                                                    <form style="display: inline;"></form>
                                                            
                                                            <form style="display: inline;" action="{{ route('user.destroy', ['user' => $user->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="input" name="submit" class="btn btn-danger" title="Supprimer user  {{ $user->name }}"
                                                                    onClick="return confirm('Supprimer {{ $user->name }}  ')">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                    @endif
                                                    
                                                    @else
                                                    <button  class="btn btn-warning ">
                                                        
                                                        <a title="Modifier user  {{ $user->name }}" href="{{ route('user.edit', ['user' => $user->id]) }}">
                                                            <i class="fa fa-edit"></i>{{__('Edit')}}
                                                        </a>
                                
                                                    </button>
                                                    <form style="display: inline;"></form>
                                                            
                                                            <form style="display: inline;" action="{{ route('user.destroy', ['user' => $user->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="input" name="submit" class="btn btn-danger" title="Supprimer user  {{ $user->name }}"
                                                                    onClick="return confirm('Supprimer {{ $user->name }}  ')">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>        
                                                    @endif       
                                                          
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
