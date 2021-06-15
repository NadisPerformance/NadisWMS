  
  <x-app-layout>
    <link rel="stylesheet" href="{{ asset('tamplet\css\usersShow.css') }}" type="text/css">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Détails d'utilisateur {{$user->name}}
        </h2>


        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
          <li class="breadcrumb-item active">Détails</li>
      </ol>
      <div class="container">
        <div class="main-body">
        
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
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <table class="table table-bordered" >
                        <thead>
                          <tr>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Code')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Type')}}</th>
                            <th>{{__('Etat')}}</th>
                          </tr>
                        </thead>
                        <tr>
                          <td>{{$user->name}}</td>
                          <td>{{$user->code}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->type}}</td>
                          <td>{{$user->etat}}</td>
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
                            <td>{{$user->tele}}</td>
                            <td>{{$user->adresse}}</td>
                            <td>{{$user->dateValidite}}</td>
                            <td>{{$user->created_at}}</td>
                             <td>{{$user->updated_at}}</td>
                          </tr>
                        </tbody>
                      </table>
                      <hr>
                      <div class="row" align="right">
                        <div class="col-sm-12">
                          <a class="btn btn-warning title="Modifier user  {{ $user->name }}" href="{{ route('user.edit', ['user' => $user->id]) }}">
                            <i class="fa fa-edit"></i>{{__('Edit')}}
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  
    
    
    
                </div>
              </div>
    
            </div>
        </div></x-app-layout>

    
