<div>
    <div class="col-lg-10 mb-10 mx-auto">

        <!-- Menampilkan pesan kesuksesan -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('barang.index') }}" class="btn btn-primary float-right
            ">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h4 class="m-15 font-weight-bold">EDIT BARANG</h4>
            </div>
            <div class="card-body">
                <form wire:submit='editBarang'>
                    <div class="form-group">
                        <label for="nm_brg">Nama Barang:</label>
                        <input wire:model='form.nm_brg' type="text" class="form-control" id="nm_brg"
                            name="nm_brg" value="{{ $barang->nm_brg }}">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan:</label>
                        <input wire:model='form.satuan' type="number" class="form-control" id="satuan"
                            name="satuan" value="{{ $barang->satuan }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input wire:model='form.harga' type="number" class="form-control" id="harga" name="harga"
                            value="{{ $barang->harga }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
