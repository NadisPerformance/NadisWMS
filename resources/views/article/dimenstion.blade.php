<div class='form-control'>
    <fieldset>
        <div class="modal-header">
            <h4 class="modal-title">Dimension</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Unité" id="unite" class="block mt-1 w-full"
                            type="text" name="unite" :value="old('unite')" required  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Precision" id="precision" class="block mt-1 w-full"
                            type="number" name="precision" :value="old('precision')" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Masse" id="masse"
                            class="block mt-1 w-full" type="number" name="masse"
                            :value="old('masse')" required />
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Poids" id="poids" class="block mt-1 w-full"
                            type="number" name="poids" :value="old('poids')" required  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Longueur" id="longueur" class="block mt-1 w-full" type="number"
                            name="longueur" :value="old('longueur')" required  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Largeur" id="idlargeur" class="block mt-1 w-full" type="number"
                            name="idlargeur" :value="old('idlargeur')" required  />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Profondeur" id="profondeur" class="block mt-1 w-full" type="number"
                            name="profondeur" :value="old('profondeur')" required  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="Coefficient" id="coefficient"
                            class="block mt-1 w-full" type="number" name="coefficient"
                            :value="old('coefficient')" required  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-jet-input placeholder="PCB(Par combien ?)" id="PCB" class="block mt-1 w-full" type="text"
                            name="PCB" :value="old('PCB')" required  />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <x-jet-input placeholder="Quantité" id="qtes" class="block mt-1 w-full" type="number"
                            name="qtes" :value="old('qtes')" required a />
                    </div>
                </div>
               
               
            </div>

        </div>




</div>


</fieldset>
</div>
