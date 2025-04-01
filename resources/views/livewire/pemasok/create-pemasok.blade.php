<div>
    <div class="col-lg-10 mb-10 mx-auto">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('pemasok.index') }}" class="btn btn-primary float-right">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h4 class="m-15 font-weight-bold">TAMBAH PEMASOK</h4>
            </div>
            <div class="card-body">
                <form wire:submit='save'>
                    <div class="form-group">
                        <label for="nm_pemasok">Nama Pemasok:</label>
                        <input wire:model.blur='form.nm_pemasok' type="text" class="form-control" id="nm_pemasok"
                            name="nm_pemasok">
                        @error('form.nm_pemasok')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input wire:model.blur='form.alamat' type="text" class="form-control" id="alamat"
                            name="alamat">
                        @error('form.alamat')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <textarea wire:model.blur='form.keterangan' class="form-control" id="keterangan" name="keterangan"></textarea>
                        @error('form.keterangan')
                            <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
