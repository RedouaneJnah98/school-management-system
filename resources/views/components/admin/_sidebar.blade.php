<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">

        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item mb-4">
                  <span class="sidebar-icon">
                        <img src="{{ asset('assets/img/icons/color-logo.svg') }}" alt="Volt Logo"/>
                    </span>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.attendances.index') ? 'active' : '' }}">
                <a href="{{ route('admin.attendances.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-calendar-date-fill" viewBox="0 0 16 16">
                            <path
                                d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zm5.402 9.746c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z"/>
                            <path
                                d="M16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm-2.89-5.435v5.332H5.77V8.079h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z"/>
                        </svg>
                    </span>
                    <span class="sidebar-text">Daily Attendance</span>
                </a>
            </li>
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-academic">
                  <span>
                    <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" height="20" width="20" fill="currentColor">
                            <path
                                d="M288 0H400c8.8 0 16 7.2 16 16V64c0 8.8-7.2 16-16 16H320V95.5L410.3 160H512c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H336V400c0-26.5-21.5-48-48-48s-48 21.5-48 48V512H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64H165.7L256 95.5V32c0-17.7 14.3-32 32-32zm48 240c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM80 224c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H80zm368 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H464c-8.8 0-16 7.2-16 16zM80 352c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H80zm384 0c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H464z"/>
                        </svg>
                    </span>
                    <span class="sidebar-text">Academic</span>
                  </span>
                  <span class="link-arrow">
                    <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"/>
                    </svg>
                  </span>
                </span>
                <div
                    class="multi-level collapse {{ request()->routeIs('admin.branches.index', 'admin.classrooms.index', 'admin.routines.index', 'admin.groups.index', 'admin.subjects.index') ? 'show' : '' }}"
                    role="list"
                    id="submenu-academic" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ request()->routeIs('admin.branches.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.branches.index') }}">
                                <span class="sidebar-text">Branches</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.classrooms.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.classrooms.index') }}">
                                <span class="sidebar-text">Classes</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.routines.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.routines.index') }}">
                                <span class="sidebar-text">Class Routine</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.groups.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.groups.index') }}">
                                <span class="sidebar-text">Groups</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.subjects.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.subjects.index') }}">
                                <span class="sidebar-text">Subject</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.admins.index') ? 'active' : '' }}">
                <a href="{{ route('admin.admins.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="20" height="20" fill="currentColor">
                            <path
                                d="M224 256c-70.7 0-128-57.3-128-128S153.3 0 224 0s128 57.3 128 128s-57.3 128-128 128zm96.1 48c2.3 74.7 36.7 158.5 106 208H0L64 304H320.1zm271.2 8.4L496 275.5V460.4c56.5-26.3 90.2-87 95.3-148zM496 512c-96-32-144-130.2-144-216V279.8L496 224l144 55.8V296c0 85.8-48 184-144 216z"/>
                        </svg>
                    </span>
                    <span class="sidebar-text">App Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-users">
                  <span>
                    <span class="sidebar-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" height="20" width="20" fill="currentColor">
                          <path
                              d="M0 24C0 10.7 10.7 0 24 0H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H24C10.7 48 0 37.3 0 24zM0 488c0-13.3 10.7-24 24-24H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zM211.2 160c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zM32 320c0-35.3 28.7-64 64-64h96c12.2 0 23.7 3.4 33.4 9.4c-37.2 15.1-65.6 47.2-75.8 86.6H64c-17.7 0-32-14.3-32-32zm461.6 32c-10.3-40.1-39.6-72.6-77.7-87.4c9.4-5.5 20.4-8.6 32.1-8.6h96c35.3 0 64 28.7 64 64c0 17.7-14.3 32-32 32H493.6zM391.2 290.4c32.1 7.4 58.1 30.9 68.9 61.6c3.5 10 5.5 20.8 5.5 32c0 17.7-14.3 32-32 32h-224c-17.7 0-32-14.3-32-32c0-11.2 1.9-22 5.5-32c10.5-29.7 35.3-52.8 66.1-60.9c7.8-2.1 16-3.1 24.5-3.1h96c7.4 0 14.7 .8 21.6 2.4zM563.2 160c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zM321.6 256c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80z"/>
                      </svg>
                    </span>
                    <span class="sidebar-text">Users</span>
                  </span>
                  <span class="link-arrow">
                    <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"/>
                    </svg>
                  </span>
                </span>
                <div class="multi-level collapse {{ request()->routeIs('admin.teachers.index', 'admin.students.index', 'admin.parents.index') ? 'show' : '' }}" role="list"
                     id="submenu-users" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ request()->routeIs('admin.teachers.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.teachers.index') }}">
                                <span class="sidebar-text">Teachers</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.parents.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.parents.index') }}">
                                <span class="sidebar-text">Parents</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.students.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.students.index') }}">
                                <span class="sidebar-text">Students</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
                            <path
                                d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
                            <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                        </svg>
                    </span>
                    <span class="sidebar-text">Marks</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.trashed') ? 'active' : '' }}">
                <a href="{{ route('admin.trashed') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                          <path
                              d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z"/>
                        </svg>
                    </span>
                    <span class="sidebar-text">Trash</span>
                </a>
            </li>
            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
        </ul>
    </div>
</nav>
