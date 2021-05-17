<x-app-layout>
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification de l'article du code {{$article->codeArticle}}
        </h2>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('article.index')}}">Articles</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol> 

    <div class="container" >
        <div class="row" >
            
                
                <form action="{{route('article.update',['article'=>$article->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                   
                    @include('article.infosGenerale')
                    @include('article.configration')
                    
                    @include('article.affectation')
                    @include('article.seuil')


                    <div class="modal-footer">
                        <input type="hidden" name="isEmpty" value="">
                        <button type="input" name="submit" value="newAccount" class="btn btn-success btn-icon"><i class="fa fa-check"></i> Modefier</button>
                    </div>
                
                </form>
            
        </div>
    </div>
</x-app-layout>
