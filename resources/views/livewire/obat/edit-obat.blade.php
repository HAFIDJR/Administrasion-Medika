<div>
    <div class="col-lg-10 mb-10 mx-auto">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('obat.index') }}" class="btn btn-primary float-right">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h4 class="m-15 font-weight-bold">EDIT OBAT</h4>
            </div>
            <div class="card-body">
                <form wire:submit='editObat'>
                    <div class="form-group">
                        <label for="nm_obat">Nama Obat:</label>
                        <input wire:model='form.nm_obat' type="text" class="form-control" id="nm_obat"
                            name="nm_obat" value="{{ $obat->nm_obat }}">
                        @error('form.nm_obat')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan:</label>
                        <input wire:model='form.satuan' type="number" class="form-control" id="satuan"
                            name="satuan" value="{{ $obat->satuan }}">
                        @error('form.satuan')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input wire:model='form.harga' type="number" class="form-control" id="harga" name="harga"
                            value="{{ $obat->harga }}">
                        @error('form.harga')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
