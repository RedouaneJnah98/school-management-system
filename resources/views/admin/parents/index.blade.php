<x-dashboard_layout>
    @section('title', 'Parents')
    {{-- sidebar --}}
    @include('components.admin._sidebar')

    <main class="content pb-5">
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
                        <li class="breadcrumb-item active" aria-current="page">Parents</li>
                    </ol>
                </nav>
                <h2 class="h4">All Ajiale School Parent</h2>
                <p class="mb-0">This list contains the best Parents in the world.</p>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
                @can('create', App\Models\Parents::class)
                    <a href="{{ route('admin.parents.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add New
                    </a>
                @endcan

                <div class="btn-group ms-2 ms-lg-3">
                    <a href="{{ route('admin.download_parents') }}" class="btn btn-sm btn-outline-gray-600">
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

        <div class="table-settings mb-4">
            <div class="row align-items-center justify-content-between">
                <div class="col col-md-6 col-lg-3 col-xl-4">
                    <div class="input-group me-2 me-lg-3 fmxw-400">
                            <span class="input-group-text">
                                <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        <input type="text" class="form-control" placeholder="Search student">
                    </div>
                </div>
                <div class="col-4 col-md-2 col-xl-1 ps-md-0 text-end">
                    <div class="dropdown">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end pb-0">
                            <span class="small ps-3 fw-bold text-dark">Show</span>
                            <a class="dropdown-item d-flex align-items-center fw-bold" href="#">10
                                <svg class="icon icon-xxs ms-auto" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a class="dropdown-item fw-bold" href="#">20</a>
                            <a class="dropdown-item fw-bold rounded-bottom" href="#">30</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table --}}
        {{--        <div class="card border-0 shadow">--}}
        {{--            <div class="card-body">--}}
        {{--                <div class="table-responsive">--}}
        {{--                    <table class="table table-centered table-nowrap mb-0 rounded">--}}
        {{--                        <thead class="thead-light">--}}
        {{--                        <tr>--}}
        {{--                            <th class="border-0 rounded-start">Full Name</th>--}}
        {{--                            <th class="border-0">Email Address</th>--}}
        {{--                            <th class="border-0">Phone Number</th>--}}
        {{--                            @can('last_login', \App\Models\Parents::class)--}}
        {{--                                <th class="border-0">Last Login</th>--}}
        {{--                            @endcan--}}
        {{--                            <th class="border-0 rounded-end">Action</th>--}}
        {{--                        </tr>--}}
        {{--                        </thead>--}}
        {{--                        <tbody>--}}
        {{--                        <!-- Item -->--}}
        {{--                        @foreach($parents as $parent)--}}
        {{--                            <tr>--}}
        {{--                                <td class="border-0">--}}
        {{--                                    <div class="d-flex align-items-center">--}}
        {{--                                        <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="{{ $parent->profile_image }}">--}}
        {{--                                        <div><span class="h6">{{ $parent->firstname . ' ' . $parent->lastname }}</span></div>--}}
        {{--                                    </div>--}}
        {{--                                </td>--}}
        {{--                                <td class="border-0 fw-bold">{{ $parent->email }}</td>--}}
        {{--                                <td class="border-0 text-danger">--}}
        {{--                                    <span class="fw-bold">{{ $parent->phone_number }}</span>--}}
        {{--                                </td>--}}
        {{--                                @can('last_login', \App\Models\Parents::class)--}}
        {{--                                    @php--}}
        {{--                                        $last_login = $parent->last_login_date;--}}
        {{--                                    @endphp--}}
        {{--                                    <td class="border-0 fw-bold">--}}
        {{--                                        {{ $last_login ? $last_login->diffForHumans() : 'Not authenticated yet' }}--}}
        {{--                                    </td>--}}
        {{--                                @endcan--}}

        {{--                                <td class="border-0 text-success">--}}
        {{--                                    <div class="dropdown">--}}
        {{--                                        <a href="#" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false"--}}
        {{--                                           data-bs-offset="10,20">--}}
        {{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">--}}
        {{--                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>--}}
        {{--                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>--}}
        {{--                                            </svg>--}}
        {{--                                        </a>--}}
        {{--                                        <ul class="dropdown-menu py-0 dropdown-menu-dark" aria-labelledby="dropdownMenuOffset">--}}
        {{--                                            <li>--}}
        {{--                                                <a class="dropdown-item rounded-top" href="{{ route('admin.parents.show', $parent->id) }}">View Details</a>--}}
        {{--                                            </li>--}}
        {{--                                            @canany(['update', 'delete'], $parent)--}}
        {{--                                                <li>--}}
        {{--                                                    <a class="dropdown-item" href="{{ route('admin.parents.edit', $parent->id) }}">Edit</a>--}}
        {{--                                                </li>--}}
        {{--                                                <li>--}}
        {{--                                                    <form action="{{ route('admin.parents.destroy', $parent->id) }}" method="post">--}}
        {{--                                                        @method('DELETE')--}}
        {{--                                                        @csrf--}}

        {{--                                                        <a class="dropdown-item rounded-bottom delete-btn" href="#">Delete</a>--}}
        {{--                                                    </form>--}}
        {{--                                                </li>--}}
        {{--                                            @endcanany--}}
        {{--                                        </ul>--}}
        {{--                                    </div>--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                        @endforeach--}}
        {{--                        <!-- End of Item -->--}}
        {{--                        </tbody>--}}
        {{--                    </table>--}}
        {{--                    <hr>--}}
        {{--                    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">--}}
        {{--                        {{ $parents->links() }}--}}
        {{--                        <div class="fw-normal small mt-4 mt-lg-0">Showing <b>{{ $parents->firstItem() }}</b> to <b>{{ $parents->lastItem() }}</b> of <b>{{ $parents->total() }}</b> entries</div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="d-flex mb-3"><select class="form-select fmxw-200" aria-label="Message select example">
                        <option selected="selected">Bulk Action</option>
                        <option value="1">Send Email</option>
                        <option value="2">Change Group</option>
                        <option value="3">Delete User</option>
                    </select>
                    <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button>
                </div>

                <div class="table-responsive">
                    {{--                    <table class="table table-centered table-nowrap mb-0 rounded" id="example">--}}
                    {{--                        <thead class="thead-light">--}}
                    {{--                        <tr>--}}
                    {{--                            <th class="border-0 rounded-start">Full Name</th>--}}
                    {{--                            <th class="border-0">Email Address</th>--}}
                    {{--                            <th class="border-0">Phone Number</th>--}}
                    {{--                            <th class="border-0">Last Login</th>--}}
                    {{--                            @can('trashed')--}}
                    {{--                                <th class="border-0">Is Trashed</th>--}}
                    {{--                            @endcan--}}
                    {{--                            <th class="border-0 rounded-end">Action</th>--}}
                    {{--                        </tr>--}}
                    {{--                        </thead>--}}
                    {{--                        <tbody>--}}
                    {{--                        <!-- Item -->--}}
                    {{--                        @foreach($students as $student)--}}
                    {{--                            <tr>--}}
                    {{--                                <td class="border-0">--}}
                    {{--                                    <div class="d-flex align-items-center">--}}
                    {{--                                        <img class="avatar rounded me-2" alt="Image placeholder" src="{{ $student->profile_image }}">--}}
                    {{--                                        <div><span class="h6">{{ $student->firstname . ' ' . $student->lastname }}</span></div>--}}
                    {{--                                    </div>--}}
                    {{--                                </td>--}}
                    {{--                                <td class="border-0 fw-bold">{{ $student->email }}</td>--}}
                    {{--                                <td class="border-0 text-danger">--}}
                    {{--                                    <span class="fw-bold">{{ $student->phone }}</span>--}}
                    {{--                                </td>--}}
                    {{--                                @php--}}
                    {{--                                    $last_login = $student->last_login_date;--}}
                    {{--                                @endphp--}}
                    {{--                                <td class="border-0 fw-bold">--}}
                    {{--                                    {{ $last_login ? $last_login->diffForHumans() : 'Not authenticate yet' }}--}}
                    {{--                                </td>--}}
                    {{--                                @can('trashed')--}}
                    {{--                                    <td class="border-0">--}}
                    {{--                                        @if($student->trashed())--}}
                    {{--                                            <span class="badge bg-success">Yes</span>--}}
                    {{--                                        @else--}}
                    {{--                                            <span class="badge bg-danger">No</span>--}}
                    {{--                                        @endif--}}
                    {{--                                    </td>--}}
                    {{--                                @endcan--}}

                    {{--                                <td class="border-0 text-success">--}}
                    {{--                                    <div class="dropdown">--}}
                    {{--                                        <a href="#" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false"--}}
                    {{--                                           data-bs-offset="10,20">--}}
                    {{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">--}}
                    {{--                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>--}}
                    {{--                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>--}}
                    {{--                                            </svg>--}}
                    {{--                                        </a>--}}
                    {{--                                        <ul class="dropdown-menu py-0 dropdown-menu-dark" aria-labelledby="dropdownMenuOffset">--}}
                    {{--                                            <li>--}}
                    {{--                                                <a class="dropdown-item rounded-top" href="{{ route('admin.students.show', $student->id) }}">View Details</a>--}}
                    {{--                                            </li>--}}
                    {{--                                            <li>--}}
                    {{--                                                <a class="dropdown-item" href="{{ route('admin.students.edit', $student->id) }}">Edit</a>--}}
                    {{--                                            </li>--}}
                    {{--                                            <li>--}}
                    {{--                                                <form action="{{ route('admin.students.destroy', $student->id) }}" method="post">--}}
                    {{--                                                    @method('DELETE')--}}
                    {{--                                                    @csrf--}}

                    {{--                                                    <a class="dropdown-item rounded-bottom delete-btn" href="#">Delete</a>--}}
                    {{--                                                </form>--}}
                    {{--                                            </li>--}}
                    {{--                                        </ul>--}}
                    {{--                                    </div>--}}
                    {{--                                </td>--}}
                    {{--                            </tr>--}}
                    {{--                        @endforeach--}}
                    {{--                        <!-- End of Item -->--}}
                    {{--                        </tbody>--}}
                    {{--                    </table>--}}
                    <table class="table user-table table-hover align-items-center">
                        <thead>
                        <tr>
                            <th class="border-bottom">
                                <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value="" id="userCheck55">
                                    <label class="form-check-label" for="userCheck55"></label>
                                </div>
                            </th>
                            <th class="border-bottom">Full Name</th>
                            <th class="border-bottom">Children</th>
                            <th class="border-bottom">Verified</th>
                            <th class="border-bottom">Phone</th>
                            <th class="border-bottom">Last seen</th>
                            <th class="border-bottom">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($parents as $parent)
                            <tr>
                                <td>
                                    <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value="" id="userCheck1">
                                        <label class="form-check-label" for="userCheck1"></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="d-flex align-items-center"><img src="{{ $parent->profile_image }}" class="avatar rounded-circle me-3" alt="Avatar">
                                        <div class="d-block"><span class="fw-bold">{{ $parent->firstname . ' ' . $parent->lastname }}</span>
                                            <div class="small text-gray">{{ $parent->email }}</div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        @forelse($parent->childrens as $child)
                                            <a href="#" class="avatar" data-bs-toggle="tooltip" data-original-title="{{ $child->firstname }}" data-bs-original-title="{{ $child->firstname }}" title=""
                                               draggable="false">
                                                <img class="rounded" alt="Image placeholder" src="{{ $child->profile_image }}" draggable="false">
                                            </a>
                                        @empty
                                            <span class="badge bg-secondary">No children</span>
                                        @endforelse
                                    </div>
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
                                    <span class="fw-normal">{{ $parent->phone_number }}</span>
                                </td>
                                <td>
                                    @php
                                        $last_seen = $parent->last_login_date;
                                    @endphp
                                    <span class="fw-normal {{ $last_seen ? 'text-success' : 'text-danger' }}">{{ $last_seen ? $last_seen->diffForHumans() : 'Not authenticated yet' }}</span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            </svg>
                                            <span class="visually-hidden">Toggle Dropdown</span></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a class="dropdown-item d-flex align-items-center" href="#">
                                                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                Reset Pass </a><a class="dropdown-item d-flex align-items-center" href="#">
                                                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                    <path fill-rule="evenodd"
                                                          d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                View Details </a><a class="dropdown-item d-flex align-items-center" href="#">
                                                <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z"/>
                                                </svg>
                                                Suspend</a></div>
                                    </div>
                                    <svg class="icon icon-xs text-danger ms-1" title="" data-bs-toggle="tooltip" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                         data-bs-original-title="Delete" aria-label="Delete">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                        {{ $parents->links() }}
                        <div class="fw-normal small mt-4 mt-lg-0">Showing <b>{{ $parents->firstItem() }}</b> to <b>{{ $parents->lastItem() }}</b> of <b>{{ $parents->total() }}</b> entries</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-dashboard_layout>

{{-- Success Notification --}}
<x-notification.success_notif/>
{{-- Delete Modal --}}
<x-modals.delete/>
{{-- Delete Notification --}}
<x-notification.delete_notif/>
