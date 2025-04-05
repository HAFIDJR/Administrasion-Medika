<div>
    <div class="col-lg-10 mb-10 mx-auto">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('barang.index') }}" class="btn btn-primary float-right">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h4 class="m-15 font-weight-bold">TAMBAH BARANG</h4>
            </div>
            <div class="card-body">
                <form wire:submit='save'>
                    <div class="form-group">
                        <label for="nm_brg">Nama Barang:</label>
                        <input wire:model='form.nm_brg' type="text" class="form-control" id="nm_brg"
                            name="nm_brg">
                        @error('form.nm_brg')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan:</label>
                        <input wire:model='form.satuan' type="number" class="form-control" id="satuan"
                            name="satuan">
                        @error('form.satuan')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input wire:model='form.harga' type="number" class="form-control" id="harga"
                            name="harga">
                        @error('form.harga')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
