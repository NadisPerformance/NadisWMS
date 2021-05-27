<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une test') }}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('test.store') }}" method="POST">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-check form-switch">
                            <input value=1 @if(old('notionAlcool',$article->notionAlcool ?? null)==1) checked @endif class="form-check-input" name="notionAlcool" type="checkbox" id="notionAlcool" onClick="Affiche('notionAlcool','qte')">
                            <label class="form-check-label" for="notionAlcool">Notion d'alcoole</label>
                        </div>
                        <div  style="display: none" id="qte">
                            <div class="form-group">
                                <x-jet-input placeholder="Quantité d'alcool" class="block mt-1 w-full" type="number" name="qteAlcool" id="qteAlcool"
                                value="{{old('qteAlcool',$article->qteAlcool ?? null)}}"  />
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
                                class="fa fa-check"></i> Creer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function Affiche(attr1, attr2) {
            var x = document.getElementById(attr1);
            var y = document.getElementById(attr2);
            if (x.checked == true) {
                y.style.display = "block";
            } else {
                y.style.display = "none";
            }
        }

    </script>
</x-app-layout>
