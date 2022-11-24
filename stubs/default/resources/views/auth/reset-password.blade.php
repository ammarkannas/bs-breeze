<x-guest-layout class="container">
    <div class="row d-flex flex-column align-content-center">
        <div class="col-4 text-center">
            <a href="/">
                <x-application-logo class="w-25 h-25 text-danger my-3" style="fill: currentColor;" />
            </a>
        </div>

        <div class="col-4">
            <x-auth-card class="border-0 shadow-sm">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <x-text-input type="email" name="email" :value="old('email', $request->email)"
                                      :label="__('Email')" required autofocus />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-text-input type="password" name="password" :label="__('Password')" required />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-text-input type="password" name="password_confirmation" :label="__('Confirm Password')" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-end mt-4 pt-4 border-top">
                        <x-primary-button>
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </div>
</x-guest-layout>
