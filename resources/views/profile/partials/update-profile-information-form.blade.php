<section>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">
                {{ __('Profile Information') }}
            </h2>
            <p class="card-subtitle">
                {{ __("Update your account's profile information.") }}
            </p>
        </div>

        <div class="card-body">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}" enctype="multipart/form-data">
                @csrf
            </form>

            <form id="profile-update-form" method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="name" class="form-label">{{__('Name')}}</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" autocomplete="current-name">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lastname" class="form-label">{{__('Last Name')}}</label>
                    <input id="lastname" name="lastname" type="text" class="form-control" value="{{ old('lastname', $user->lastname) }}" autocomplete="current-last_name">
                    @error('lastname')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">{{__('Email')}}</label>
                    <input id="email" name="email" type="text" class="form-control" value="{{ old('email', $user->email) }}" autocomplete="current-email">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}
                                <button form="send-verification"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="username" class="form-label">{{__('Username')}}</label>
                    <input id="username" name="username" type="text" class="form-control" value="{{ old('username', $user->username) }}" autocomplete="current-username">
                    @error('username')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birthday" class="form-label">{{__('Birthday')}}</label>
                    <input id="birthday" name="birthday" type="date" class="datepicker form-control" value="{{ old('birthday', $user->birthday) }}" autocomplete="current-birthday">
                    @error('birthday')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photo" class="">{{__('Update Profile Photo')}}</label>
                    <br>
                    <input id="photo" name="photo" type="file" class="">
                    @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>

                    @if (session('status') === 'profile-updated')
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
            </form>
        </div>
    </div>
</section>
