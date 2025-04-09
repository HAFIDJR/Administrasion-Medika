<div>

    @php
        $role = auth()->user()->role;
    @endphp

    @if ($role === 'admin')
        <div class="col-lg-8 mb-10 mx-auto">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{ route('pasien.index') }}" class="btn btn-primary float-right">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h4 class="m-15 font-weight-bold">EDIT PASIEN</h4>
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

                    <form wire:submit='editPasien'>
                        <div class="form-group">
                            <label for="nm_pasien">Nama Pasien:</label>
                            <input type="text" class="form-control" id="nm_pasien" name="nm_pasien"
                                value="{{ $pasien->nm_pasien }}" wire:model='form.nm_pasien'>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur:</label>
                            <input type="text" class="form-control" id="umur" name="umur"
                                value="{{ $pasien->umur }}" wire:model='form.umur'>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $pasien->alamat }}" wire:model='form.alamat'>
                        </div>
                        <div class="form-group">
                            <label for="tensi">Tensi:</label>
                            <input type="text" class="form-control" id="tensi" name="tensi"
                                value="{{ $pasien->tensi }}" wire:model='form.tensi'>
                        </div>
                        <div class="form-group">
                            <label for="keluhan">Keluhan:</label>
                            <input type="text" class="form-control" id="keluhan" name="keluhan"
                                value="{{ $pasien->keluhan }}" wire:model='form.keluhan'>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

    @endif
</div>
