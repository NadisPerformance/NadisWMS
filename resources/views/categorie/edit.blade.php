<x-app-layout>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification du categorie de value {{$categorie->value}}
        </h2>
        @if (session('msg'))
            <h3 style="color: green">
                {{ session()->get('msg') }}
            </h3>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('categorie.index')}}">Categories</a></li>
            <li class="breadcrumb-item active">Modification</li>
          </ol>
    <div class="container">
        <div class="row">
            <div class="modal-content">


                <form action="{{ route('categorie.update', ['categorie' => $categorie->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">

                                    <x-jet-input placeholder="Value" id="value" class="block mt-1 w-full" type="number"
                                        name="value" value="{{old('value',$categorie->value)}}" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <x-jet-label for="discription" value="{{ __('Description') }}" />
                                    <textarea class="form-control" id="discription" rows="8" type="textarea" name="discription"
                                    value="" required>{{old('discription',$categorie->discription)}}</textarea>

                                </div>
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
                                class="fa fa-check"></i> Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
