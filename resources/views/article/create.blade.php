<x-app-layout>
   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une article') }}
        </h2>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('article.index')}}">Articles</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol> 

    <div class="container" >
        <div class="row" >
            
                
                <form action="{{ route('article.store') }}" method="POST">
                    @csrf
                    @include('article.infosGenerale')
                    @include('article.configration')
                    
                    @include('article.affectation')
                    @include('article.seuil')


                    <div class="modal-footer">
                        <input type="hidden" name="isEmpty" value="">
                        <button type="input" name="submit" value="newAccount" class="btn btn-success btn-icon"><i
                                class="fa fa-check"></i> Ajouter</button>
                    </div>
                
                </form>
          
        </div>
    </div>
</x-app-layout>
