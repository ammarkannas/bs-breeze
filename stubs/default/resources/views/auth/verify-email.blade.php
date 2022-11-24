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
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 fw-normal small text-success">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 d-flex align-items-center justify-content-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-primary-button>
                                {{ __('Resend Verification Email') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="text-decoration-none">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </x-auth-card>
        </div>
    </div>
</x-guest-layout>
