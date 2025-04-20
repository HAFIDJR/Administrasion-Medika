<div>
    @php
        $role = auth()->user()->role;
    @endphp

    <div class="col-lg-8 mb-10 mx-auto">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/periksa-pasien" class="btn btn-primary float-right">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h4 class="m-15 font-weight-bold">KETERANGAN PASIEN</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form>
                    <div class="form-group">
                        <label for="nm_pasien">Nama Pasien:</label>
                        <input type="text" class="form-control" id="nm_pasien" name="nm_pasien"
                            wire:model='form.nm_pasien'>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur:</label>
                        <input type="text" class="form-control" id="umur" name="umur" wire:model='form.umur'>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            wire:model='form.alamat'>
                    </div>
                    <div class="form-group">
                        <label for="tensi">Tensi:</label>
                        <input type="text" class="form-control" id="tensi" name="tensi"
                            wire:model='form.tensi'>
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan:</label>
                        <input type="text" class="form-control" id="tensi" name="keluhan"
                            wire:model='form.keluhan'>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa:</label>
                        <input type="text" class="form-control" id="diagnosa" name="diagnosa"
                            wire:model='form.diagnosa'>
                    </div>
                    <div class="form-group">
                        <label for="keterangan_dosis">Keterangan Dosis:</label>
                        <input type="text" class="form-control" id="keterangan_dosis" name="keterangan_dosis"
                            wire:model='form.keterangan_dosis'>
                    </div>

                    <div class="form-group">
                        <div class="row mb-3 align-items-end">
                            <div class="col-md-4">
                                <label for="obat_1" class="form-label">Obat</label>
                                <select id="obat_1" class="form-control obat-select" name="obat_ids[]" data-harga="0"
                                    wire:model.change="obat_id">
                                    <option value="">Pilih Obat</option>
                                    @foreach ($obat as $o)
                                        <option value="{{ $o->id }}" data-harga="{{ $o->harga }}">
                                            {{ $o->nm_obat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="stockObat" class="form-label">Stock</label>
                                <input type="number" name="stockObat" class="form-control stock-obat"
                                    wire:model='stockObat' placeholder="Stock" disabled>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <button type="button" class="btn btn-primary me-2" id="addObat"
                                        wire:click='updateObatPasien' wire:loading.remove
                                        wire:target="updateObatPasien">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <div wire:loading wire:target="updateObatPasien">
                                        <button class="btn btn-primary">
                                            <div class="spinner-border spinner-border-sm" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 obat-row">
                            @error('obat_id')
                                <div class="text-danger mx-auto" style="width: 45%">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="total">Subtotal:</label>
                        <input disabled type="number" name="total" id="total" class="form-control"
                            wire:model='form.total'>
                    </div>


                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>


            </div>
        </div>
    </div>

    <div class="col-lg-8 mb-10 mx-auto">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-15 font-weight-bold">DETAIL PEMERIKSAAN</h4>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Obat</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailPeriksa as $detail)
                        <tr>
                            <td>{{ $detail->obat->nm_obat ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $detail->obat->harga ?? 'Tidak Ada' }}</td>
                            <td>
                                <div class="input-group w-auto justify-content-center align-items-center">
                                    <input type="button" value="-"
                                        wire:click="changeStorageObat({{ $detail->id }}, '-')"
                                        class="button-minus border rounded-circle  icon-shape icon-sm mx-1 "
                                        data-field="quantity">
                                    <input type="number" step="1" max="10"
                                        value="{{ $detail->jumlah }}" name="quantity"
                                        class="quantity-field border-0 text-center w-25">

                                    <input type="button" value="+"
                                        wire:click="changeStorageObat({{ $detail->id }},'+' )"
                                        class="button-plus border rounded-circle icon-shape icon-sm lh-0"
                                        data-field="quantity">
                                </div>
                            </td>
                            <td>
                                <form style="display:inline;">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody><br />
            </table>
            {{-- Total: {{$detail->pasien->total ?? 'tidak ada'}}
        </div> --}}
        </div>
    </div>
