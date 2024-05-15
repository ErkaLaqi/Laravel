<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
<div class="row"> <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Details</h4>

                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLastname">Lastname</label>
                        <x-text-input id="lastname" name="lastname" type="text" class="form-control" :value="old('lastname', $user->lastname)" required autofocus autocomplete="lastname" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername">Username</label>
                        <x-text-input id="username" name="username" type="text" class="form-control" :value="old('username', $user->username)" required autofocus autocomplete="username" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <x-text-input id="email" name="email" type="text" class="form-control" :value="old('email', $user->email)" required autofocus autocomplete="email" />
                    </div>
                    <div class="mt-4 form-group">
                        <x-input-label for="birthday" :value="__('Birthday')" />
                        <br>
                        <x-text-input id="birthday" class=" datepicker " type="date" name="birthday" class="form-control" :value="old('birthday', $user->birthday)"  autofocus autocomplete="birthday" />
                        <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profile Photo</h4>
                <form class="forms-sample" enctype="multipart/form-data">
                    <div class="container-fluid grid-margin">
                        <img src="{{asset('assets_pluginAdmin/images/dashboard/img_1.jpg')}}" alt="profile" />
                    </div>

                    <div class="form-group container-fluid grid-margin">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default" />
                        <div class="grid-margin">
                            <input type="file" class="file-upload-info grid-margin" placeholder="Upload Image" />


                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <button class="btn btn-light">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div> </div>



       {{-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />--}}


            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

        <div class="flex items-center gap-4">
            <x-primary-button class="btn btn-primary mr-1">{{ __('Save') }}</x-primary-button>
           {{-- <button type="submit" class="btn btn-primary mr-1"> {{ __('Save') }} </button>--}}
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
