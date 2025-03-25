<div>
    <div class="col-lg-8 mb-10 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-15 font-weight-bold">TAMBAH DATA RAWAT INAP</h4>
            </div>
            <div class="card-body">
                <!-- Menampilkan pesan kesuksesan -->
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Formulir Tambah Rawat Inap -->
                <form wire:submit='save'>
                    <div class="form-group">
                        <label for="pengajuan">Pengajuan</label>
                        <select wire:model="form.pengajuan" class="form-control" id="pengajuan" name="pengajuan">
                            <option value="" disabled selected hidden>Pilih Pengajuan</option>
                            <option value="Rawat Inap">Rawat Inap</option>
                            <option value="Rawat Jalan">Rawat Jalan</option>
                            <option value="IGD">IGD</option>
                        </select>

                        <div class="fw-bold mt-2 ml-1">
                            @error('form.pengajuan')
                                <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input wire:model='form.namaPasien' type="text"
                            class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien"
                            name="nama_pasien">
                        <div class="fw-bold mt-2 ml-1">
                            @error('form.namaPasien')
                                <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input wire:model='form.noHp' type="number" 
                            class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp">
                        <div class="fw-bold mt-2 ml-1">
                            @error('form.noHp')
                                <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea wire:model='form.alamat' class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            name="alamat" rows="3" placeholder="JLN Anggrek no 10"></textarea>
                        <div class="fw-bold mt-2 ml-1">
                            @error('form.alamat')
                                <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea wire:model='form.keluhan' class="form-control @error('keluhan') is-invalid @enderror" id="keluhan"
                            name="keluhan" rows="3">{{ old('keluhan') }}</textarea>
                        <div class="fw-bold mt-2 ml-1">
                            @error('form.keluhan')
                                <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alasan">Alasan</label>
                        <textarea wire:model='form.alasan' class="form-control @error('alasan') is-invalid @enderror" id="alasan"
                            name="alasan" rows="3">{{ old('alasan') }}</textarea>
                        <div class="fw-bold mt-2 ml-1">
                            @error('form.alasan')
                                <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input wire:model='form.tanggalMasuk' type="date"
                            class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk"
                            name="tanggal_masuk" value="{{ old('tanggal_masuk') }}">
                        <div class="fw-bold mt-2 ml-1">
                            @error('form.tanggalMasuk')
                                <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_keluar">Tanggal Keluar (Opsional)</label>
                        <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror"
                            id="tanggal_keluar" name="tanggal_keluar" value="{{ old('tanggal_keluar') }}">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                        <a href="{{ route('rawat.index') }}" class="btn btn-secondary" wire:navigate>Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
