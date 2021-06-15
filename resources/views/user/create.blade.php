<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Ajouter un utilisateur 
      </h2>
      @if (session('msg'))
    <h3 style="color: green">
        {{ session()->get('msg') }}
    </h3>
    @endif
    <style>

        .form-control {
            font-size: 15px;
        }
        .form-control, .form-control:focus, .input-group-text {
            border-color: #e1e1e1;
        }
        .form-control, .btn {        
            border-radius: 3px;
        }
        .signup-form {
            width: 400px;
            margin: 0 auto;
            padding: 30px 0;		
        }
        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .signup-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .signup-form hr {
            margin: 0 -30px 20px;
        }
        .signup-form .form-group {
            margin-bottom: 20px;
        }
        .signup-form label {
            font-weight: normal;
            font-size: 15px;
        }
        .signup-form .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }	
        .signup-form .input-group-addon {
            max-width: 42px;
            text-align: center;
        }	
        .signup-form .btn, .signup-form .btn:active {        
            font-size: 16px;
            font-weight: bold;
            background: #19aa8d !important;
            border: none;
            min-width: 140px;
        }
        .signup-form .btn:hover, .signup-form .btn:focus {
            background: #179b81 !important;
        }
        .signup-form a {
            color: #fff;	
            text-decoration: underline;
        }
        .signup-form a:hover {
            text-decoration: none;
        }
        .signup-form form a {
            color: #19aa8d;
            text-decoration: none;
        }	
        .signup-form form a:hover {
            text-decoration: underline;
        }
        .signup-form .fa {
            font-size: 21px;
        }
        .signup-form .fa-paper-plane {
            font-size: 18px;
        }
        .signup-form .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }
        </style>


<div class="signup-form">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
		<ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 
        
<div class="modal-body">      
    
        
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input  class="form-control" type="text" name="name" :value="old('name')" placeholder="Username" required="required">
			</div>
        </div>
        

        
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-key"></span>
					</span>                    
				</div>
				<input  class="form-control" type="number" name="code" :value="old('code')" placeholder="Code" required="required">
			</div>
        </div>
        
    

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" :value="old('email')" placeholder="Email Address" required="required">
			</div>
        </div>

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="">{{ __('Etat') }}</i>
					</span>                    
				</div>
                <select name="etat"  class="form-select" aria-label="Default select example">
                    <option value="Actif">Actif</option>
                    <option value="Inactif">Inactif</option>
                </select>
            </div>
        </div>

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="">{{ __('Type') }}</i>
					</span>                    
				</div>
                
                <select name="type"  class="form-select" aria-label="Default select example">
                    <option value="Editeur">Editeur</option>
                    <option value="Intégrateur">Intégrateur</option>
                    <option value="Utilisateur">Utilisateur</option>
                </select>
            </div>
        </div>

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-phone"></i>
					</span>                    
				</div>
				<input type="number" class="form-control" name="tele" :value="old('tele')" placeholder="{{ __('Télé') }}" required="required">
			</div>
        </div>

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-calendar"></i>
					</span>                    
				</div>
				<input type="adresse" class="form-control" name="adresse" :value="old('adresse')" placeholder="{{ __('Adresse') }}" required="required">
			</div>
        </div>

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="date" class="form-control" name="dateValidite" :value="old('dateValidite')" placeholder="{{ __('Date de validité') }}" required="required">
			</div>
        </div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input class="form-control" type="password" name="password" placeholder="Password" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>                    
				</div>
				<input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required="required">
			</div>
        </div>
       
		<div class="modal-footer">
            <input type="hidden" name="isEmpty" value="">
            <button type="input" name="submit" value="newAccount" class="btn btn-success btn-icon"><i
                    class="fa fa-check"></i> Créer</button>
        </div>
    </form>
</div>


   
</x-app-layout>
