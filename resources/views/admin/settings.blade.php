<x-dashboard_layout>
    @section('title', 'Settings')

    {{-- Sidebar --}}
    @include('components.admin._sidebar')

    <main class="content pb-5">
        {{-- Navbar --}}
        @include('components.settings.admin.navbar')

        <div class="alert alert-success mt-5">
            Edit your account settings and change your password here.
        </div>
        <div class="card border-0 shadow mt-2">
            <div class="d-flex justify-content-center align-items-center">
                <div class="card-body">
                    <div class="border border-success p-2 mb-2">
                        Your email address is: <strong>{{ auth()->user()->email }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-dashboard_layout>
