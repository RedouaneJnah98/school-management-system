<x-dashboard_layout>
    @section('title', 'Trashed')
    {{-- sidebar --}}
    @include('components.admin._sidebar')

    {{-- Navbar --}}
    @include('components.settings.admin.navbar')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Students</li>
                </ol>
            </nav>
            <h2 class="h4">Trashed Student accounts</h2>
            <p class="mb-0">You can restore a student account or delete it permanently.</p>
        </div>
    </div>

    {{-- Table --}}
    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded" id="myTable">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">Full Name</th>
                        <th class="border-0">Deleted</th>
                        <th class="border-0">Restore</th>
                        <th class="border-0">Delete Permanently</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Item -->
                    @forelse($students as $student)
                        <tr>
                            <td class="border-0">
                                <div class="d-flex align-items-center">
                                    <img class="avatar rounded me-2" alt="Image placeholder" src="{{ $student->profile_image }}">
                                    <div><span class="h6">{{ $student->firstname . ' ' . $student->lastname }}</span></div>
                                </div>
                            </td>
                            <td class="border-0 fw-bold">{{ $student->deleted_at->diffForHumans() }}</td>
                            <td class="border-0 text-danger">
                                <a href="{{ route('admin.restore_student', $student->id) }}" class="btn btn-info btn-sm">Restore</a>
                            </td>
                            <td class="border-0 text-success">
                                <form action="{{ route('admin.force_delete', $student->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf

                                    <a class="btn btn-sm soft-delete-btn btn-danger" href="#">Delete</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-info text-center" colspan="4">Table is empty.</td>
                        </tr>
                    @endforelse
                    <!-- End of Item -->
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
    </div>
</x-dashboard_layout>

{{-- Success Notification --}}
<x-notification.success_notif/>
{{-- Delete Modal --}}
<x-modals.messages.soft_delete/>
{{-- Delete Notification --}}
<x-notification.delete_notif/>
