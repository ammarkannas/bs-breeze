<x-app-layout>
    <x-slot name="header">
        <h5 class="fw-semibold">
            {{ __('Profile') }}
        </h5>
    </x-slot>

    <div class="container">
        <div class="mx-auto">
            <div class="p-4 bg-white shadow-sm mb-3 rounded">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 bg-white shadow-sm mb-3 rounded">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 bg-white shadow-sm mb-3 rounded">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
