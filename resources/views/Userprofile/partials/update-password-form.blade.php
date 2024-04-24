<section class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="h5 font-medium text-gray-900">
                {{ __('Update Password') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('password.update') }}" class="mt-4">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" autocomplete="current-password">
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                    <input type="password" id="password" name="password" class="form-control" autocomplete="new-password">
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password">
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="d-flex align-items-center gap-4">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                    @if (session('status') === 'password-updated')
                        <p class="text-sm text-gray-600">
                            {{ __('Saved.') }}
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
