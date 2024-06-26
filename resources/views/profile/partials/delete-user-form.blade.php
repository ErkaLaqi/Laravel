<section class="space-y-6">
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            padding: 20px;
            max-width: 400px;
            max-height: 400px;
            width: 100%;
            border-radius: 8px;
        }

        .modal h2 {
            margin-bottom: 10px;
        }

        .modal p {
            margin-bottom: 20px;
        }

        .modal input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e0;
            border-radius: 4px;
            margin-top: 5px;
        }

        .modal button {
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .modal .secondary-button {
            background-color: #edf2f7;
            color: #4a5568;
            border: 1px solid #cbd5e0;
            margin-right: 10px;
        }

        .modal .btn-danger {
            background-color: #e53e3e;
            color: white;
            border: none;
        }
    </style>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" onclick="openDeleteModal()" class="btn btn-danger">{{__('Delete Account')}}</button>

    <div id="delete-account-modal" class="modal" style="display: none;">
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <div class="mt-6 flex justify-end d-flex">
                <button type="button" onclick="closeDeleteModal()" class=" btn secondary-button ms-3">{{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-danger ms-3">{{ __('Delete Account') }}</button>
            </div>
        </form>
    </div>
</section>

<script>
    function openDeleteModal() {
        document.getElementById('delete-account-modal').style.display = 'block';
    }

    function closeDeleteModal() {
        document.getElementById('delete-account-modal').style.display = 'none';
    }
</script>
