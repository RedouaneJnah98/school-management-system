<x-dashboard_layout>

    @section('title', 'Dashboard')
    {{-- sidebar --}}
    @include('components.admin._sidebar')

    {{-- Navbar --}}
    @include('components.settings.admin.navbar')

    <div class="py-4">
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
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="dropdown-icon text-gray-400 me-2" viewBox="0 0 20 20">
                        <path
                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                        <path
                            d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                    </svg>
                    Add Student
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                        </path>
                    </svg>
                    Add Parent
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                        </path>
                    </svg>
                    Add Files
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card bg-yellow-100 border-0 shadow">
                <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                    <div class="d-block mb-3 mb-sm-0">
                        <div class="fs-5 fw-normal mb-2">School Report</div>
                        <h2 class="fs-3 fw-extrabold">$10,567</h2>
                        <div class="small mt-2">
                            <span class="fw-normal me-2">Yesterday</span>
                            <span class="fas fa-angle-up text-success"></span>
                            <span class="text-success fw-bold">10.57%</span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="ct-chart ct-double-octave"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Teachers</h2>
                                <h3 class="fw-extrabold mb-1">{{ $teachers }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Teachers</h2>
                                <h3 class="fw-extrabold mb-2">{{ $teachers }}</h3>
                            </div>
                            <small class="d-flex align-items-center text-gray-500">
                                Sept 1 - June 20,
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3 mx-2" viewBox="0 0 16 16">
                                    <path
                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                    <path
                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                Year
                            </small>
                            <div class="small d-flex mt-1">
                                <div>
                                    Since last month
                                    @if($teachers_states_result >= 1)
                                        <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <svg class="icon icon-xs text-danger" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    @endif

                                    <span class="text-{{ $parent_states_result >= 1 ? 'success' : 'danger' }} fw-bolder">{{ ceil($teachers_states_result) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 20 20">
                                    <path
                                        d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                                    <path
                                        d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Students</h2>
                                <h3 class="mb-1">{{ $students }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Students</h2>
                                <h3 class="fw-extrabold mb-2">{{ $students }}</h3>
                            </div>
                            <small class="d-flex align-items-center text-gray-500">
                                Sept 1 - June 20,
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3 mx-2" viewBox="0 0 16 16">
                                    <path
                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                    <path
                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                Year
                            </small>
                            <div class="small d-flex mt-1">
                                <div>
                                    Since last month
                                    @if($students_states_result >= 1)
                                        <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <svg class="icon icon-xs text-danger" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                    <span class="text-{{ $parent_states_result >= 1 ? 'success' : 'danger' }} fw-bolder">{{ ceil($students_states_result) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Parents</h2>
                                <h3 class="mb-1">{{ $parents }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Parents</h2>
                                <h3 class="fw-extrabold mb-2">{{ $parents }}</h3>
                            </div>
                            <small class="d-flex align-items-center text-gray-500">
                                Sept 1 - June 20,
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3 mx-2" viewBox="0 0 16 16">
                                    <path
                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                    <path
                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                Year
                            </small>
                            <div class="small d-flex mt-1">
                                <div>
                                    Since last month
                                    @if($parent_states_result >= 1)
                                        <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <svg class="icon icon-xs text-danger" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                    <span class="text-{{ $parent_states_result >= 1 ? 'success' : 'danger' }} fw-bolder">{{ ceil($parent_states_result) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="row">
                <div class="col-12 col-md-6 col-xxl-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header border-bottom"><h2 class="fs-5 fw-bold mb-0">Parents that have most children</h2></div>
                        <div class="card-body py-0">
                            <ul class="list-group list-group-flush">
                                @forelse($most_children as $item)
                                    <li class="list-group-item bg-transparent border-bottom py-3 px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto"><a href="#" class="avatar-md"><img class="rounded" alt="Image placeholder" src="{{ $item->profile_image }}"></a>
                                            </div>
                                            <div class="col-auto px-0">
                                                <h4 class="fs-6 text-dark mb-0">
                                                    <a href="#">Chris Wood</a>
                                                </h4>
                                                <div class="d-flex align-items-center">
                                                    @if(\Carbon\Carbon::now()->minute(2) === $item->last_login_date)
                                                        <x-scripts.parent_status type="success">
                                                            Online
                                                        </x-scripts.parent_status>
                                                    @else
                                                        <x-scripts.parent_status type="danger">
                                                            Offline
                                                        </x-scripts.parent_status>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col text-end"><span class="fs-6 fw-bolder text-dark">{{ $item->children_count }} Children.</span></div>
                                        </div>
                                    </li>
                                @empty
                                    <p class="text-center">There is no student related to parent accounts.</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xxl-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header border-bottom"><h2 class="fs-5 fw-bold mb-0">Top Author Earnings</h2></div>
                        <div class="card-body py-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent border-bottom py-3 px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><a href="#" class="avatar-md"><img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-1.jpg"></a>
                                        </div>
                                        <div class="col-auto px-0"><h4 class="fs-6 text-dark mb-0"><a href="#">Chris Wood</a></h4><span class="small">Graphic Designer</span></div>
                                        <div class="col text-end"><span class="fs-6 fw-bolder text-dark">$1,834</span></div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent border-bottom py-3 px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><a href="#" class="avatar-md"><img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-3.jpg"></a>
                                        </div>
                                        <div class="col-auto px-0"><h4 class="fs-6 text-dark mb-0"><a href="#">Bonnie Green</a></h4><span class="small">Web Developer</span></div>
                                        <div class="col text-end"><span class="fs-6 fw-bolder text-dark">$1,355</span></div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent border-bottom py-3 px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><a href="#" class="avatar-md"><img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-2.jpg"></a>
                                        </div>
                                        <div class="col-auto px-0"><h4 class="fs-6 text-dark mb-0"><a href="#">Chris Wood</a></h4><span class="small">React Developer</span></div>
                                        <div class="col text-end"><span class="fs-6 fw-bolder text-dark">$1,297</span></div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent border-bottom py-3 px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><a href="#" class="avatar-md"><img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-4.jpg"></a>
                                        </div>
                                        <div class="col-auto px-0"><h4 class="fs-6 text-dark mb-0"><a href="#">Neil Sims</a></h4><span class="small">Python Developer</span></div>
                                        <div class="col text-end"><span class="fs-6 fw-bolder text-dark">$875</span></div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent border-bottom py-3 px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><a href="#" class="avatar-md"><img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-5.jpg"></a>
                                        </div>
                                        <div class="col-auto px-0"><h4 class="fs-6 text-dark mb-0"><a href="#">Rebbeca Sas</a></h4><span class="small">UI/UX, Art Directo</span></div>
                                        <div class="col text-end"><span class="fs-6 fw-bolder text-dark">$872</span></div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent border-bottom py-3 px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><a href="#" class="avatar-md"><img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-6.jpg"></a>
                                        </div>
                                        <div class="col-auto px-0"><h4 class="fs-6 text-dark mb-0"><a href="#">Jacklyn Brown</a></h4><span class="small">UI/UX, Art Directo</span></div>
                                        <div class="col text-end"><span class="fs-6 fw-bolder text-dark">$605</span></div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent py-3 px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><a href="#" class="avatar-md"><img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-7.jpg"></a>
                                        </div>
                                        <div class="col-auto px-0"><h4 class="fs-6 text-dark mb-0"><a href="#">Melinda Norrow</a></h4><span class="small">UI/UX, Art Directo</span></div>
                                        <div class="col text-end"><span class="fs-6 fw-bolder text-dark">$305</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xxl-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                            <h2 class="fs-5 fw-bold mb-0">Team members</h2>
                            <a href="#" class="btn btn-sm btn-primary">See all</a>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush list my--3">
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar">
                                                <img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-1.jpg">
                                            </a>
                                        </div>
                                        <div class="col-auto ms--2">
                                            <h4 class="h6 mb-0">
                                                <a href="#">Chris Wood</a>
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-success dot rounded-circle me-1"></div>
                                                <small>Online</small>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                Invite
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar">
                                                <img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-2.jpg">
                                            </a>
                                        </div>
                                        <div class="col-auto ms--2">
                                            <h4 class="h6 mb-0">
                                                <a href="#">Jose Leos</a>
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-warning dot rounded-circle me-1"></div>
                                                <small>In a meeting</small>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                Message
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar">
                                                <img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-3.jpg">
                                            </a>
                                        </div>
                                        <div class="col-auto ms--2">
                                            <h4 class="h6 mb-0">
                                                <a href="#">Bonnie Green</a>
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-danger dot rounded-circle me-1"></div>
                                                <small>Offline</small>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                Message
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar">
                                                <img class="rounded" alt="Image placeholder" src="../../assets/img/team/profile-picture-4.jpg">
                                            </a>
                                        </div>
                                        <div class="col-auto ms--2">
                                            <h4 class="h6 mb-0">
                                                <a href="#">Neil Sims</a>
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-danger dot rounded-circle me-1"></div>
                                                <small>Offline</small>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                Message
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xxl-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                            <h2 class="fs-5 fw-bold mb-0">Progress track</h2>
                            <a href="#" class="btn btn-sm btn-primary">See tasks</a>
                        </div>
                        <div class="card-body">
                            <!-- Project 1 -->
                            <div class="row mb-4">
                                <div class="col-auto">
                                    <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                              d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="h6 mb-0">Rocket - SaaS Template</div>
                                            <div class="small fw-bold text-gray-500"><span>75 %</span></div>
                                        </div>
                                        <div class="progress mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Project 2 -->
                            <div class="row align-items-center mb-4">
                                <div class="col-auto">
                                    <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                              d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="h6 mb-0">Themesberg - Design System</div>
                                            <div class="small fw-bold text-gray-500"><span>60 %</span></div>
                                        </div>
                                        <div class="progress mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Project 3 -->
                            <div class="row align-items-center mb-4">
                                <div class="col-auto">
                                    <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                              d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="h6 mb-0">Homepage Design in Figma</div>
                                            <div class="small fw-bold text-gray-500"><span>45 %</span></div>
                                        </div>
                                        <div class="progress mb-0">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Project 4 -->
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                              d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="h6 mb-0">Backend for Themesberg v2</div>
                                            <div class="small fw-bold text-gray-500"><span>34 %</span></div>
                                        </div>
                                        <div class="progress mb-0">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="col-12 px-0 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                        <div class="d-block">
                            <div class="h6 fw-normal text-gray mb-2">Total orders</div>
                            <h2 class="h3 fw-extrabold">452</h2>
                            <div class="small mt-2">
                                <span class="fas fa-angle-up text-success"></span>
                                <span class="text-success fw-bold">18.2%</span>
                            </div>
                        </div>
                        <div class="d-block ms-auto">
                            <div class="d-flex align-items-center text-end mb-2">
                                <span class="dot rounded-circle bg-gray-800 me-2"></span>
                                <span class="fw-normal small">July</span>
                            </div>
                            <div class="d-flex align-items-center text-end">
                                <span class="dot rounded-circle bg-secondary me-2"></span>
                                <span class="fw-normal small">August</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="ct-chart-ranking ct-golden-section ct-series-a"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 px-0 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3">
                            <div>
                                <div class="h6 mb-0 d-flex align-items-center">
                                    <svg class="icon icon-xs text-gray-500 me-2" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    Global Rank
                                </div>
                            </div>
                            <div>
                                <a href="#" class="d-flex align-items-center fw-bold">
                                    #755
                                    <svg class="icon icon-xs text-gray-500 ms-1" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-bottom py-3">
                            <div>
                                <div class="h6 mb-0 d-flex align-items-center">
                                    <svg class="icon icon-xs text-gray-500 me-2" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    Country Rank
                                </div>
                                <div class="small card-stats">
                                    United States
                                    <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="d-flex align-items-center fw-bold">
                                    #32
                                    <svg class="icon icon-xs text-gray-500 ms-1" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-3">
                            <div>
                                <div class="h6 mb-0 d-flex align-items-center">
                                    <svg class="icon icon-xs text-gray-500 me-2" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                              clip-rule="evenodd"></path>
                                        <path
                                            d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z">
                                        </path>
                                    </svg>
                                    Category Rank
                                </div>
                                <div class="small card-stats">
                                    Computers Electronics > Technology
                                    <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="d-flex align-items-center fw-bold">
                                    #11
                                    <svg class="icon icon-xs text-gray-500 ms-1" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 px-0">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h2 class="fs-5 fw-bold mb-1">Acquisition</h2>
                        <p>
                            Tells you where your visitors originated from, such as search
                            engines, social networks or website referrals.
                        </p>
                        <div class="d-block">
                            <div class="d-flex align-items-center me-5">
                                <div class="icon-shape icon-sm icon-shape-danger rounded me-3">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="d-block">
                                    <label class="mb-0">Bounce Rate</label>
                                    <h4 class="mb-0">33.50%</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <div class="icon-shape icon-sm icon-shape-purple rounded me-3">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="d-block">
                                    <label class="mb-0">Sessions</label>
                                    <h4 class="mb-0">9,567</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-dashboard_layout>

<x-scripts.admin_chart :teachers="$teachers" :students="$students" :parents="$parents"/>
