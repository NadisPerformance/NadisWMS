<x-app-layout>
    <x-slot name="header">
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
    </x-slot>

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
            
            
        <table class="table table-hover" id="table" >
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
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button>
                                        <a class="btn btn-success btn-icon "
                                            href="{{ route('article.show', ['article' => $article->id]) }}">Plus</a>
                                    </button>

                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <button>
                                        <a class="btn btn-warning "
                                            href="{{ route('article.edit', ['article' => $article->id]) }}">Modifier</a>
                                    </button>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    @if ($article->etat == 'A supprimer')
                                        <form action="{{ route('article.destroy', ['article' => $article->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="input" name="submit" class="btn btn-danger btn-icon"
                                                onClick="return confirm('Supprimer {{ $article->codeArticle }} !? ')">
                                                Supprimer</button>
                                        </form>
                                    @endif
                                  </div>
                                </div>
                               
                          </div>
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
