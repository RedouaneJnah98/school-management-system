<x-dashboard_layout>
    @section('title', 'Settings')

    {{-- Sidebar --}}
    @include('components.admin._sidebar')

    {{-- Navbar --}}
    @include('components.settings.admin.navbar')
    {{-- Modal --}}
    <x-modals.messages.settings_modal/>

    <x-settings.alert>
        Edit your account settings, or change your password here.
    </x-settings.alert>

    <div class="card border-0 shadow mt-2">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card-body">
                <h6>Email:</h6>
                <div class="border border-primary p-2 mb-2 d-flex justify-content-between align-items-center">
                    <div>
                        Your email address is: <strong>{{ auth()->user()->email }}</strong>
                    </div>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-form">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd"
                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Edit
                    </button>
                </div>
                <hr>
                <h6>Password:</h6>
                <form action="{{ route('admin.update-password') }}" method="POST">
                    @csrf

                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                           placeholder="Enter Old Password" value="{{ old('old_password') }}">
                    @error('old_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <input type="password" class="form-control mt-3 @error('new_password') is-invalid @enderror" name="new_password"
                           placeholder="Enter New Password" value="{{ old('new_password') }}">
                    @error('new_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="password" class="form-control mt-3" name="new_password_confirmation"
                           placeholder="Re-type New Password" value="{{ old('new_password_confirmation') }}">

                    <button type="submit" class="btn btn-primary text-white mt-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-dashboard_layout>

<x-modals.messages.failed/>
<x-modals.messages.success/>
