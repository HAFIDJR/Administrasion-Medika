<div>
    
    <form wire:submit.prevent='save'>
        <div class="row gy-3 gy-md-4 overflow-hidden">
            <div class="col-12">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="name" class="form-control" name="name" id="name" placeholder="Riyoko"
                    wire:model='form.name'>
                <div class="fw-bold text-danger">
                    @error('form.name')
                        <span class="error ">{{ $message }}</span>
                    @enderror
                </div>
            </div>
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
                <input type="password" class="form-control" name="password" id="password" value=""
                    wire:model='form.password'>
                <div class="fw-bold text-danger">
                    @error('form.password')
                        <span class="error ">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <label for="password_confirmation" class="form-label">Password Confirmation <span
                        class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                    value="" wire:model='form.password_confirmation'>
                <div class="fw-bold text-danger">
                    @error('form.password_confirmation')
                        <span class="error ">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-primary" type="submit">Register</button>
                </div>
            </div>
        </div>
    </form>
</div>
