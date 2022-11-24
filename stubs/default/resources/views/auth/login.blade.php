<x-guest-layout class="container">
    <div class="row d-flex flex-column align-content-center">
        <div class="col-4 text-center">
            <a href="/">
                <x-application-logo class="w-50 h-50 text-danger my-3" style="fill: currentColor;" />
            </a>
        </div>

        <div class="col-4">
            <x-auth-card class="border-0 shadow-sm">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                      autofocus :validation="true" />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-text-input type="password" name="password" autocomplete="current-password" required
                                      :label="__('Password')" :validation="true" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="d-flex justify-content-between mt-4 pt-4 border-top">
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="ml-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </div>
</x-guest-layout>
