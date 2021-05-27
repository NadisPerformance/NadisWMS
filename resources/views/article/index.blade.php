<x-app-layout>
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des articles') }}
        </h2>

        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        @if (session('msge'))
            <h3 style="color: red">
                {{ session()->get('msge') }}
            </h3>
        @endif    
            @if (session('msgee'))
            <h3 style="color: red">
                {{ session()->get('msgee') }}
            </h3>
     @endif
            @if (session('msgeee'))
            <h3 style="color: red">
                {{ session()->get('msgeee') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Articles</li>
        </ol> 

    <div class="container">
    <form action="{{ route('actionArticle') }}" method="GET">
    @csrf
    <button>
            <a class="btn btn-success btn-icon " href="{{ route('article.create') }}">Ajouter</a>
        </button>
        <button type="submit" name="action" value="valide" class="btn btn-primary btn-icon"
                onClick="return confirm('Valider  !? ')"> Valider</button>
                <button type="submit" name="action" value="Asupp" class="btn btn-dark btn-icon"
                onClick="return confirm('A Supprimer  !? ')"> A Supprimer</button>
        <button type="submit" name="action" value="supp" class="btn btn-danger btn-icon"
                onClick="return confirm('Supprimer  !? ')"> Supprimer</button>
            
            
        <table class="table table-bordered" id="table" >
            <thead>
                <tr>
                    <th><input type="checkbox" onclick="checkAll(this)"></th>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Etat</th>
                    <th>Actions</th>


                </tr>
            </thead>

            <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <td><input type="checkbox" name="{{ $article->id }}" value="{{ $article->id }}"></td>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->codeArticle }}</td>
                        <td>{{ $article->etat }}</td>
                        <td>
                            <button title="Détails" >
                                <a class="btn btn-primary " href="{{ route('article.show', ['article' => $article->id]) }}">
                                  +
                                  </a>
                            </button>

                            <button  class="btn btn-warning ">
                                
                                <a title="Modifier article du code {{ $article->codeArticle }}" href="{{ route('article.edit', ['article' => $article->id]) }}">
                                    <i class="fa fa-edit"></i>Modifier
                                </a>
        
                            </button>
                            <form style="display: inline;"></form>
                                    @if ($article->etat == 'A supprimer')
                                    <form style="display: inline;" action="{{ route('article.destroy', ['article' => $article->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="input" name="submit" class="btn btn-danger" title="Supprimer article du code {{ $article->codeArticle }}"
                                            onClick="return confirm('Supprimer {{ $article->codeArticle }} !? ')">
                                            <i class="fa fa-trash"></i>Supprimer
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
       

        </form>
       
    </div>
</x-app-layout>
