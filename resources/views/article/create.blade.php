<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une article') }}
        </h2>

    </x-slot>

    <div class="container" >
        <div class="row" >
            <div class="modal-content">
                
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
    </div>
</x-app-layout>
