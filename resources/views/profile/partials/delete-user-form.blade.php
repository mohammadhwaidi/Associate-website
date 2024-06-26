<section class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="h5 font-weight-bold text-gray-900">
                {{ __('Delete Account') }}
            </h2>
        </div>

        <div class="card-body">
            <p class="text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>

            <button type="button" class="btn btn-danger mt-3"
                    data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
                {{ __('Delete Account') }}
            </button>
        </div>
    </div>

    <!-- Confirm User Deletion Modal -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" role="dialog" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h5 font-weight-bold text-gray-900">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
                        @csrf
                        @method('delete')

                        <div class="mb-3">
                            <label for="password" class="form-label sr-only">{{ __('Password') }}</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}" required>
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </button>
                            <button type="submit" class="btn btn-danger">
                                {{ __('Delete Account') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
