<section>
    <header>
        <h2>Update Password</h2>
        <p class="mt-1 small text-black-50">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="form-label">
                {{ __('Current Password') }}
            </label>

            <input type="password" id="current_password" name="current_password" class="form-control"
                   autocomplete="current-password" required>

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="form-label">
                {{ __('New Password') }}
            </label>

            <input type="password" id="password" name="password" class="form-control"
                   autocomplete="new-password" required>

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="form-label">
                {{ __('Confirm Password') }}
            </label>

            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                   autocomplete="new-password" required>

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="d-flex align-items-center mt-4">
            <button class="btn btn-sm btn-primary" type="submit">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p class="small text-success fw-bold my-0 mx-3">
                    {{ __('Password updated successfully') }}
                </p>
            @endif
        </div>
    </form>
</section>
