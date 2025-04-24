<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="{{ route('transaksi_masuk.index') }}" class="btn btn-primary float-right">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h4 class="m-15 font-weight-bold">TAMBAH TRANSAKSI MASUK</h4>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="no_trans">No Transaksi:</label>
                                <input type="hidden" name="no_trans_generated" id="no_trans_generated"
                                    value="{{ old('no_trans_generated') }}">
                                <input type="text" name="no_trans" id="no_trans" class="form-control"
                                    wire:model='form.no_trans' disabled>
                                @error('form.no_trans')
                                    <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tgl">Tanggal:</label>
                                <input wire:model='form.tgl' type="date" name="tgl" id="tgl"
                                    class="form-control" value="{{ old('tgl') }}">
                                @error('form.tgl')
                                    <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="pasien_id" class="col-md-4 col-form-label text-md-end">Pasien</label>
                                <div class="col-md-6">
                                    <input wire:model='form.nm_pasien' wire:model.live.debounce.250ms='form.nm_pasien'
                                        type="text" id="nm_pasien" class="form-control" name="nm_pasien"
                                        autocomplete="off" placeholder="Masukkan Nama Pasien">
                                    @if (count($pasien) > 0)
                                        <div class="card">
                                            <ul class="dropdown-menu show w-100" id="searchDropdown"
                                                style="max-height: 100px; overflow-y: auto; position: absolute; top: 100%; left: 0;">
                                                @foreach ($pasien as $p)
                                                    <li><a class="dropdown-item"
                                                            wire:click='selectPasien({{ $p->id }})'>{{ $p->nm_pasien }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @error('form.nm_pasien')
                                        <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div id="obat-container">
                                <div class="row mb-3">
                                    <div class="col-md-4 fw-bold">Nama Obat</div>
                                    <div class="col-md-4 fw-bold">Jumlah</div>
                                    <div class="col-md-2 fw-bold">Harga Satuan</div>
                                    <div class="col-md-2 fw-bold">Total</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <input wire:model='form.keterangan' type="text" name="keterangan" id="keterangan"
                                    class="form-control" value="{{ old('keterangan') }}">
                                @error('form.keterangan')
                                    <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan_dosis">Keterangan Dosis:</label>
                                <input wire:model='form.keterangan_dosis' type="text" name="keterangan_dosis"
                                    id="keterangan_dosis" class="form-control" value="{{ old('keterangan_dosis') }}">
                                @error('form.keterangan_dosis')
                                    <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="harga_periksa">Harga Periksa:</label>
                                <input wire:model='form.harga_periksa' type="number" id="harga_periksa"
                                    name="harga_periksa" class="form-control"
                                    placeholder="Masukkan harga periksa pasien" min="0" step="0.01">
                                @error('form.harga_periksa')
                                    <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="total">Subtotal:</label>
                                <input type="number" name="total" id="total" class="form-control"
                                    value="{{ old(key: 'total') }}" readonly>
                                @error('form.total')
                                    <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- 
                            <button x-on:click="$wire.showModal = true" type="button"
                                class="btn btn-primary">Simpan</button> --}}

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah data sudah benar diisi?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button wire:click='save' type="button" class="btn btn-primary" id="confirmSubmit"
                        wire:click="save" wire:loading.attr ="disabled" data-bs-dismiss="modal"> <span
                            wire:loading.remove>Simpan</span>
                        <span wire:loading>Menyimpan...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
