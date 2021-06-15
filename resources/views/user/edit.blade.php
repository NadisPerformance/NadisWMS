  
  <x-app-layout>
    <link rel="stylesheet" href="{{ asset('tamplet\css\usersShow.css') }}" type="text/css">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Modification d'utilisateur {{$user->name}}
        </h2>


        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
          <li class="breadcrumb-item active">Modification</li>
      </ol>
      <div class="container">
        <div class="main-body">
            <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
              <!-- /Breadcrumb -->
        
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ $user->profile_photo_url }}" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4>{{$user->name}}</h4>
                          <p class="text-secondary mb-1">{{$user->type}}</p>
                          <button class="btn btn-outline-primary">Message</button>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                </div>
                <div class="" >
                  <div class="card mb">
                    <div class="card-body">
                      <table class="table table-bordered" >
                        <thead width="2000">
                          <tr>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Code')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Type')}}</th>
                            <th>{{__('Etat')}}</th>
                          </tr>
                        </thead>
                        <tr>
                          <td>
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name',$user->name)}}" required autofocus autocomplete="name" />
                          </td>
                          <td>
                            <x-jet-input id="code" class="block mt-1 w-full" type="number" name="code" value="{{old('code',$user->code)}}" required autofocus autocomplete="code" />
                          </td>
                          <td>
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email',$user->email)}}" required />
                          </td>
                          <td>
                            <select name="etat"  class="form-select" aria-label="Default select example">
                                <option value="Actif"{{(old('etat',$user->etat)=='Actif')? 'selected':''}}>Actif</option>
                                <option value="Inactif"{{(old('etat',$user->etat)=='Inactif')? 'selected':''}}>Inactif</option>
                            </select>
                          </td>
                          <td>
                            <select name="type"  class="form-select" aria-label="Default select example">
                                <option value="Editeur"{{(old('type',$user->type)=='Editeur')? 'selected':''}}>Editeur</option>
                                <option value="Intégrateur"{{(old('type',$user->type)=='Intégrateur')? 'selected':''}}>Intégrateur</option>
                                <option value="Utilisateur"{{(old('type',$user->type)=='Utilisateur')? 'selected':''}}>Utilisateur</option>
                            </select>
                          </td>
                        </tr>
                        <thead>
                          <tr>
                            <th>{{__('Télé')}}</th>
                            <th>{{__('Adresse')}}</th>
                            <th>{{__('Date de validité')}}</th>
                            <th>{{__('created_at')}}</th>
                            <th>{{__('updated_at')}}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                                <x-jet-input id="tele" placeholder="0666666666" class="block mt-1 w-full" type="number" name="tele" value="{{old('tele',$user->tele)}}" required autofocus autocomplete="tele" />
                            </td>
                            <td>
                                <x-jet-input id="adresse"  class="block mt-1 w-full" type="text" name="adresse" value="{{old('adresse',$user->adresse)}}" required autofocus autocomplete="adresse" />
                            </td>
                            <td>
                                <x-jet-input id="dateValidite"  class="block mt-1 w-full" type="date" name="dateValidite" value="{{old('dateValidite',$user->dateValidite)}}" required autofocus autocomplete="dateValidite" />
                            </td>
                            <td><label value="{{$user->password}}" name="password">{{$user->created_at}}</label></td>
                             <td>{{$user->updated_at}}</td>
                          </tr>
                        </tbody>
                      </table>
                      <hr>
                      <div class="row" align="right">
                        <div class="col-sm-12">
                         <button type="input" name="submit" value="newAccount" class="btn btn-info"><i
                            class="fa fa-check"></i> {{__('Edit')}}
                         </button>
                        </div>
                      </div>
                    </div>
                  </div>
    
               
    
    
    
                </div>
            </form>
              </div>
    
            </div>
        </div></x-app-layout>

    
