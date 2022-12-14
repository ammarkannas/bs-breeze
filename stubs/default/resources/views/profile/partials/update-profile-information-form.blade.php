<section>
    <header>
        <h2>
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 small text-black-50">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf

        @method('patch')

        <div>
            <label for="name" class="form-label">
                {{ __('Name') }}
            </label>

            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                   autocomplete="name" required>

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="form-label">
                {{ __('Email') }}
            </label>

            <input type="email" id="email" name="email" class="form-control" value="{{ old('name', $user->email) }}"
                   autocomplete="email" required>

            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center mt-4">
            <button class="btn btn-sm btn-primary" type="submit">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p class="small text-success fw-bold my-0 mx-3">
                    {{ __('Saved') }}
                </p>
            @endif
        </div>
    </form>
</section>
