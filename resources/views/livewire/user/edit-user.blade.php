<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update User </div>

                    <div class="card-body">
                        <form wire:submit='editUser'>
                            <div class="row mb-3">
                                <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>

                                <div class="col-md-6">
                                    <select id="role" name="role" class="form-control" wire:model='form.role'>
                                        <option value="">--Pilih Roles--</option>
                                        <option value="admin">Admin</option>
                                        <option value="pasien">Pasien</option>
                                        <option value="dokter">Dokter</option>
                                    </select>

                                    @error('form.role')
                                        <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nama</label>

                                <div class="col-md-6">
                                    <input wire:model='form.name' id="name" type="text" class="form-control"
                                        name="name" value="{{ $user->name }}">

                                    @error('form.name')
                                        <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Alamat Email</label>

                                <div class="col-md-6">
                                    <input wire:model='form.email' id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}">
                                    @error('form.email')
                                        <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input wire:model='form.password' id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Masukan password untuk konfirmasi">

                                    @error('form.password')
                                        <span class="error text-danger" style="font-size: 100%">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label wire:model='form.password_confirmation' for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">Konfirmasi
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Ulangi password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Perbarui
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
