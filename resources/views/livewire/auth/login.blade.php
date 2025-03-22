<div>
    {{-- Failed Login Modal --}}

    @error('error')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror


    <form wire:submit.prevent='login'>
        <div class="row gy-3 gy-md-4 overflow-hidden">
            <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com"
                    wire:model='form.email'>
                <div class="fw-bold text-danger">
                    @error('form.email')
                        <span class="error ">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" id="password" wire:model='form.password'>
                <div class="fw-bold text-danger">
                    @error('form.password')
                        <span class="error ">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me"
                        wire:model='form.remember_me'>
                    <label class="form-check-label text-secondary" for="remember_me">
                        Keep me logged in
                    </label>
                </div>
            </div>
            <div class="col-12">
                <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-primary" type="submit">Log in</button>
                </div>
            </div>
        </div>
    </form>
</div>
