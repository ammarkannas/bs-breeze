<x-guest-layout class="container">
    <div class="row d-flex flex-column align-content-center">
        <div class="col-6 text-center">
            <a href="/">
                <x-application-logo class="w-25 h-25 text-danger my-3" style="fill: currentColor;" />
            </a>
        </div>

        <div class="col-6">
            <x-auth-card class="border-0 shadow-sm">

                <div class="mb-4 small text-black-50">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-text-input type="email" name="email" :value="old('email')" :label="__('Email')" required
                                      autofocus />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </div>
</x-guest-layout>
