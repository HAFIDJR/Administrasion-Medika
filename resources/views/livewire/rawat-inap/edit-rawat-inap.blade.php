<div class="col-lg-8 mb-10 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-15 font-weight-bold">Edit Status Pengajuan Rawat Inap</h4>
        </div>
        <div class="card-body">
            <!-- Menampilkan pesan kesuksesan jika ada -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Formulir Edit Status -->
            <form wire:submit='editRawat'>
                <div class="form-group">
                    <label for="status">Status Pengajuan</label>
                    <select class="form-control" id="status" name="status" wire:model='status'>
                        <option value="belum diverifikasi">Belum Diverifikasi</option>
                        <option value="disetujui">Disetuju</option>
                        <option value="ditolak">Ditolak</option>
                        <option value="selesai">Selesai</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Update Status</button>
                    <a href="{{ route('rawat.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
