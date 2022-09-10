<x-dashboard_layout>
    @section('title', 'Subjects')
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
                    <li class="breadcrumb-item active" aria-current="page">Subjects</li>
                </ol>
            </nav>
            <h2 class="h4">All Subjects</h2>
            <p class="mb-0">This list contains all subjects.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="dropdown">
                <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    New Task
                </button>
                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.subject-teacher') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="dropdown-icon text-gray-400 me-2" viewBox="0 0 20 20">
                            <path
                                d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                            <path
                                d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                        </svg>
                        Taught By
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.subject-branch') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="dropdown-icon text-gray-400 me-2" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1z"/>
                        </svg>
                        Related Branch
                    </a>
                </div>
            </div>
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>
    </div>


    {{-- Table --}}
    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded" id="myTable">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">
                            <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value="" id="userCheck55">
                                <label class="form-check-label" for="userCheck55"></label>
                            </div>
                        </th>
                        <th class="border-0">#</th>
                        <th class="border-0">Subject Name</th>
                        <th class="border-0">Taught by</th>
                        <th class="border-0">Related Branch</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Item -->
                    @forelse($subjects as $subject)
                        <tr>
                            <td class="border-0">
                                <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value="" id="userCheck1">
                                    <label class="form-check-label" for="userCheck1"></label>
                                </div>
                            </td>
                            <td class="border-0">{{ $subject->id }}</td>
                            <td class="border-0">{{ $subject->name }}</td>
                            <td class="border-0 fw-bold">
                                <a class="badge bg-gray-200 text-black position-relative teachers-link" data-id="{{ $subject->id }}">
                                    Teacher(s)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                        {{ $subject->teachers_count }}
                                    </span>
                                </a>
                            </td>
                            <td class="border-0 fw-bold">
                                <a class="badge bg-gray-200 text-black position-relative branches-link" data-id="{{ $subject->id }}">
                                    Branch(es)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                        {{ $subject->branches_count }}
                                    </span>
                                </a>
                            </td>
                            <td class="border-0">
                                <div class="btn-group">
                                    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                        </svg>
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.subjects.edit', $subject->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-gray-400 me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd"
                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                            Edit Info
                                        </a>
                                    </div>
                                </div>
                                <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" style="display: inline-block">
                                    @method('DELETE')
                                    @csrf

                                    <a href="#" class="delete-btn">
                                        <svg class="icon icon-xs text-danger ms-1" title="" data-bs-toggle="tooltip" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                             data-bs-original-title="Delete" aria-label="Delete">
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-info text-center" colspan="7">Table is empty.</td>
                        </tr>
                    @endforelse
                    <!-- End of Item -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-dashboard_layout>

{{-- Success Notification --}}
<x-notification.success_notif/>
{{-- Delete Modal --}}
<x-modals.messages.delete/>
{{-- Delete Notification --}}
<x-notification.delete_notif/>
{{-- Live modal --}}
<x-modals.subject.teachers/>
<x-modals.subject.branches/>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $('.teachers-link').on('click', function () {
            let id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.all-subject-teachers') }}',
                data: {id: id},
                success: function (data) {
                    $('.data').html(data);

                    $('#subject-teachers-modal').modal('show');
                },
                error: function () {
                    console.log('there is an error');
                }
            })
        })
        $('.branches-link').on('click', function () {
            let id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.all-subject-branches') }}',
                data: {id: id},
                success: function (data) {
                    $('.data').html(data);

                    $('#subject-branches-modal').modal('show');
                },
                error: function () {
                    console.log('there is an error');
                }
            })
        })

    })
</script>

