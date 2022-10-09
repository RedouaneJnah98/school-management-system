<x-dashboard_layout>
    @section('title', 'Parents')
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
                    <li class="breadcrumb-item active" aria-current="page">Parents</li>
                </ol>
            </nav>
            <h2 class="h4">All Ajiale School Parent</h2>
            <p class="mb-0">This list contains the best Parents in the world.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{--            @can('create', App\Models\Parents::class)--}}
            <a href="{{ route('admin.parents.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New
            </a>
            {{--            @endcan--}}

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

    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="d-flex mb-5"><select class="form-select fmxw-200" aria-label="Message select example">
                    <option selected="selected">Bulk Action</option>
                    <option value="1">Send Email</option>
                    <option value="2">Change Group</option>
                    <option value="3">Delete User</option>
                </select>
                <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table user-table table-hover align-items-center" id="myTable">
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
                        <th class="border-bottom">Status</th>
                        <th class="border-bottom">Last seen</th>
                        <th class="border-bottom">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parents as $parent)
                        <tr>
                            <td>
                                <div class="form-check dashboard-check">
                                    <input class="form-check-input" type="checkbox" value="" id="userCheck1">
                                    <label class="form-check-label" for="userCheck1"></label>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.parents.show', $parent->id) }}" class="d-flex align-items-center">
                                    <img src="{{ Storage::url($parent->profile_image) }}" class="avatar rounded-circle me-3" alt="Avatar" style="object-fit: cover;object-position: top;">
                                    <div class="d-block">
                                        <span class="fw-bold">{{ $parent->fullName }}</span>
                                        <div class="small text-gray">{{ $parent->email }}</div>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="avatar-group">
                                    @forelse($parent->children as $child)
                                        <a href="{{ route('admin.students.show', $child->id) }}" class="avatar" data-bs-toggle="tooltip" data-original-title="{{ $child->firstname }}"
                                           data-bs-original-title="{{ $child->firstname }}" title="" draggable="false">
                                            <img class="rounded" alt="Image placeholder" src="{{ Storage::url($child->profile_image)  }}" draggable="false"
                                                 style="object-fit: cover;object-position: top">
                                        </a>
                                    @empty
                                        <span class="badge bg-secondary">No children</span>
                                    @endforelse
                                </div>
                            <td>
                                    <span class="fw-normal d-flex align-items-center">
                                        @if($parent->hasVerifiedEmail())
                                            <svg class="icon icon-xxs text-success me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"/>
                                        </svg>
                                        @else
                                            <svg class="icon icon-xxs text-purple me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0
                                                    100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                            </svg>
                                        @endif
                                        Email
                                    </span>
                            </td>
                            <td>
                                <span class="badge bg-gray-100 {{ $parent->status === 'Active' ? 'text-success' : 'text-info' }}">{{ $parent->status }}</span>
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
                                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.parents.edit', $parent->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-gray-400 me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd"
                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                            Edit Info
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.parents.show', $parent->id) }}">
                                            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                <path fill-rule="evenodd"
                                                      d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            View Details
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z"/>
                                            </svg>
                                            Suspend
                                        </a>
                                    </div>
                                </div>
                                <form action="{{ route('admin.parents.destroy', $parent->id) }}" method="POST" style="display: inline-block">
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
                    @endforeach
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
