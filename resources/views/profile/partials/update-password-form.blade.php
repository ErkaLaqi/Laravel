<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="update_password_current_password" class="form-label">{{__('Current Password')}}</label>
                        <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                        @error('current_password', 'updatePassword')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="update_password_password" class="form-label">{{__('New Password')}}</label>
                        <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                        @error('password', 'updatePassword')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="update_password_password_confirmation" class="form-label">{{__('Confirm Password')}}</label>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                        @error('password_confirmation', 'updatePassword')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>

                        @if (session('status') === 'password-updated')
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Your Profile Information is Saved Successfully.",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                });
                            </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
