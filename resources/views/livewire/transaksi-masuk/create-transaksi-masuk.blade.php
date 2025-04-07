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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form>
                            <div class="form-group">
                                <label for="no_trans">No Transaksi:</label>
                                <input type="hidden" name="no_trans_generated" id="no_trans_generated"
                                    value="{{ old('no_trans_generated') }}">
                                <input type="text" name="no_trans" id="no_trans" class="form-control"
                                    wire:model='form.no_trans'>
                            </div>

                            <div class="form-group">
                                <label for="tgl">Tanggal:</label>
                                <input wire:model='form.tgl' type="date" name="tgl" id="tgl"
                                    class="form-control" value="{{ old('tgl') }}">
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
                                </div>
                            </div>


                            <div id="obat-container">
                                <!-- Header tabel akan dimasukkan di sini -->
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control"
                                    value="{{ old('keterangan') }}">
                            </div>
                            <div class="form-group">
                                <label for="keterangan_dosis">Keterangan Dosis:</label>
                                <input type="text" name="keterangan_dosis" id="keterangan_dosis" class="form-control"
                                    value="{{ old('keterangan_dosis') }}">
                            </div>

                            <div class="form-group">
                                <label for="harga_periksa">Harga Periksa:</label>
                                <input type="number" id="harga_periksa" name="harga_periksa" class="form-control"
                                    placeholder="Masukkan harga periksa pasien" min="0" step="0.01">
                            </div>

                            <div class="form-group">
                                <label for="total">Subtotal:</label>
                                <input type="number" name="total" id="total" class="form-control"
                                    value="{{ old('total') }}" readonly>
                            </div>

                            <button type="button" id="showConfirmModal" class="btn btn-primary">Simpan</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah data sudah benar diisi?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmSubmit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
