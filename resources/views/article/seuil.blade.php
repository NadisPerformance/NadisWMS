<div class='form-control'>
    <fieldset>
        <div class="modal-header">
            <h4 class="modal-title">Seuil</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jet-input placeholder="Seuil alerte périmé (exprimé en nombre de jours) " id="seuilAlertePerime" class="block mt-1 w-full"
                            type="number" name="seuilAlertePerime" value="{{old('seuilAlertePerime',$article->seuilAlertePerime ?? null)}}" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jet-input placeholder="Seuil blocage périmé (exprimé en nombre de jours)" id="seuilBlocagePerime" class="block mt-1 w-full" type="number"
                            name="seuilBlocagePerime" value="{{old('seuilBlocagePerime',$article->seuilBlocagePerime ?? null)}}" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jet-input placeholder="Seuil d’approvisionnement maximum " id="SeuilApprovisionnementMax" class="block mt-1 w-full"
                            type="number" name="SeuilApprovisionnementMax" value="{{old('SeuilApprovisionnementMax',$article->SeuilApprovisionnementMax ?? null)}}" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jet-input placeholder="Seuil d’approvisionnement minimum" id="SeuilApprovisionnementMin" class="block mt-1 w-full" type="number"
                            name="SeuilApprovisionnementMin" value="{{old('SeuilApprovisionnementMin',$article->SeuilApprovisionnementMin ?? null)}}" required />
                    </div>
                </div>
            </div>



        </div>






    </fieldset>
</div>
