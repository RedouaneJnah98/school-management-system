<x-dashboard_layout>
    @section('title', 'Class Attendance')
    {{-- sidebar --}}
    @include('components.teacher._sidebar')

    {{-- Navbar --}}
    @include('components.settings.teacher.navbar')

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
                    <li class="breadcrumb-item"><a href="{{ route('teacher.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Classrooms</li>
                </ol>
            </nav>
            <h2 class="h4">Daily Attendance</h2>
            <p class="mb-0">Take a daily attendance of student in your class.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Take Attendance
            </button>

            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>

    </div>

    <div class="card border-0 shadow">
        <div class="card-body">
            {{-- Offcanvas --}}
            {{--            <x-admin.offcanvas/>--}}

            <div class="row">
                <div class="d-flex justify-content-center gap-3">
                    <div class="col-3">
                        <select class="form-select" id="class_schedule">
                            <option selected disabled>Select a month</option>
                            @php
                                $months = [];

                                for ($m=1; $m<=12; $m++) {
                                    $months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
                                }
                            @endphp
                            @foreach($months as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <select class="form-select" id="class_schedule">
                            <option selected disabled>Select a year</option>
                            <option>2021/2022</option>
                            <option>2022/2023</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <select class="form-select" id="class_schedule">
                            <option selected disabled>Select a class</option>
                            {{--                            @foreach($classes as $class)--}}
                            {{--                                <option value="{{ $class->id }}">{{ $class->name }}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>

                    <x-filter_button/>

                    <button class="btn btn-gray-200" id="class_schedule_filter" type="submit">
                        <div class="after-loading">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                            </svg>
                            Filter
                        </div>
                    </button>
                </div>
            </div>
            <hr class="mt-4">

            <!-- .cd-schedule --> <!-- .cd-schedule -->
            <div class="test_container">
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
