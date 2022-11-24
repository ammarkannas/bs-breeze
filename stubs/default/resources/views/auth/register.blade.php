<x-guest-layout class="container">
    <div class="row d-flex flex-column align-content-center">
        <div class="col-4 text-center">
            <a href="/">
                <x-application-logo class="w-25 h-25 text-danger my-3" style="fill: currentColor;" />
            </a>
        </div>
        <div class="col-4">
            <x-auth-card class="border-0 shadow-sm">
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </x-slot>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-text-input type="text" name="name" :value="old('name')" :label="__('Name')" required
                                      autofocus validation />

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-text-input type="email" name="email" :value="old('email')" :label="__('Email')"
                                      required validation />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-text-input type="password" name="password" :label="__('Password')" required
                                      autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-text-input class="block mt-1 w-full" type="password" :label="__('Confirm Password')"
                                      name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-between mt-4 pt-4 border-top">
                        <a class="text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </div>
</x-guest-layout>
