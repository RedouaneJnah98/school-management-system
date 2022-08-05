<x-dashboard_layout>
    @section('title', 'Teachers')
    {{-- Sidebar --}}
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
                    <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                </ol>
            </nav>
            <h2 class="h4">All Ajiale School Teachers</h2>
            <p class="mb-0">This list contains the best Teachers in the world.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            @can('create', App\Models\Teacher::class)
                <a href="{{ route('admin.teachers.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New
                </a>
            @endcan

            <div class="btn-group ms-2 ms-lg-3">
                <a href="{{ route('admin.download_teachers') }}" class="btn btn-sm btn-outline-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                        <path
                            d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
                        <path fill-rule="evenodd"
                              d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
                    </svg>
                    Download
                </a>
            </div>

        </div>
    </div>

    @if(count($teachers) > 0)
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <div class="d-flex mb-5"><select class="form-select fmxw-200" aria-label="Message select example">
                    <option selected="selected">Bulk Action</option>
                    <option value="1">Send Email</option>
                    <option value="2">Change Group</option>
                    <option value="3">Delete User</option>
                </select>
                <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button>
            </div>
            <table class="table user-table table-hover align-items-center" id="myTable">
                <thead>
                <tr>
                    <th class="border-bottom">
                        <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value="" id="userCheck55">
                            <label class="form-check-label" for="userCheck55"></label>
                        </div>
                    </th>
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Name</th>
                    <th class="border-gray-200">Verified</th>
                    <th class="border-gray-200">Date Of Birth</th>
                    <th class="border-gray-200">Status</th>
                    @canany(['create', 'update','show','delete'], App\Models\Teacher::class)
                        <th class="border-gray-200">Action</th>
                    @endcanany
                </tr>
                </thead>
                <tbody>
                <!-- Teachers -->

                @foreach($teachers as $teacher)
                    <tr>
                        <td>
                            <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value="" id="userCheck1">
                                <label class="form-check-label" for="userCheck1"></label>
                            </div>
                        </td>
                        <td>
                            <span class="fw-bold">
                                {{ $teacher->id }}
                            </span>
                        </td>
                        <td>
                            <a href="#" class="d-flex align-items-center"><img src="{{ asset('storage/avatars/default-avatar-male.jpg') }}" class="avatar rounded-circle me-3" alt="Avatar">
                                <div class="d-block">
                                    <span class="fw-bold">{{ $teacher->fullName }}</span>
                                    <div class="small text-gray">{{ $teacher->email }}</div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="fw-normal d-flex align-items-center">
                                <svg class="icon icon-xxs text-success me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"/>
                                </svg>
                                Email
                            </span>
                        </td>
                        <td>
                            <span class="fw-bold">{{ $teacher->dob }}</span>
                        </td>
                        <td><span class="badge {{ $teacher->status === 'Admin' ? 'bg-success' : 'bg-secondary' }}">{{ $teacher->status }}</span></td>
                        @canany(['update','delete', 'show'], $teacher)
                            <td>
                                <div class="dropdown">
                                    <a href="#" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false"
                                       data-bs-offset="10,20">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu py-0 dropdown-menu-dark" aria-labelledby="dropdownMenuOffset">
                                        <li>
                                            <a class="dropdown-item rounded-top" href="{{ route('admin.teachers.show', $teacher->id) }}">View Details</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.teachers.edit', $teacher->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf

                                                <a class="dropdown-item rounded-bottom delete-btn" href="#">Delete</a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        @endcanany
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    @else
        <div class="alert alert-info text-center mt-5">No data available.</div>
    @endif

</x-dashboard_layout>

{{-- Success Notification --}}
<x-notification.success_notif/>
{{-- Delete Notification --}}
<x-notification.delete_notif/>

{{-- Delete Confirmation Modale --}}
<x-modals.delete/>

<script>

</script>
