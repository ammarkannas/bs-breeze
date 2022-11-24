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
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div>
                        <x-text-input id="password" type="password" name="password" :label="__('Password')"
                                      required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-between mt-4 pt-4 border-top">
                        <x-primary-button>
                            {{ __('Confirm') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </div>
</x-guest-layout>
