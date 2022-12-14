<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#user-delete-form">
        {{ __('Delete Account') }}
    </button>

    <x-modal id="user-delete-form">
        <x-slot name="title">
            {{ __('Are you sure your want to delete your account?') }}
        </x-slot>

        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <p class="mt-1 small text-black-50">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-3">
                <label for="password" hidden></label>

                <input type="password" id="password" name="password" class="form-control"
                       placeholder="{{ __('Password') }}" required>

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <button class="btn btn-sm btn-secondary mx-1" type="button" data-bs-dismiss="modal">
                    {{ __('Cancel') }}
                </button>

                <button class="btn btn-sm btn-danger" type="submit">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
