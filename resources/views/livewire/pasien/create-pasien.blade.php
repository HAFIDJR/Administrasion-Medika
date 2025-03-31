<div>
    <div class="col-lg-8 mb-10 mx-auto">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('pasien.index') }}" class="btn btn-primary float-right">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h4 class="m-15 font-weight-bold">TAMBAH PASIEN</h4>
            </div>
            <div class="card-body">
                <form wire:submit='save'>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="no_antrian">No Antrian:</label>
                            <input type="text" class="form-control" id="no_antrian" name="no_antrian"
                                wire:model="form.no_antrian" disabled>
                        </div>
                        <label for="nm_pasien">Nama Pasien:</label>
                        <input type="text" class="form-control" id="nm_pasien" name="nm_pasien"
                            wire:model.blur = 'form.nm_pasien'>
                        <div class="fw-bold mt-2 ml-1">
                            @error('form.nm_pasien')
                                <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur:</label>
                        <input type="number" class="form-control" id="umur" name="umur"
                            wire:model.blur ='form.umur'>
                        @error('form.umur')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            wire:model.blur = 'form.alamat'>
                        @error('form.alamat')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tensi">Tensi:</label>
                        <input type="text" class="form-control" id="tensi" name="tensi"
                            wire:model.blur = 'form.tensi'>
                        @error('form.tensi')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan:</label>
                        <input type="text" class="form-control" id="keluhan" name="keluhan"
                            wire:model.blur = 'form.keluhan'>
                        @error('form.keluhan')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</div>
