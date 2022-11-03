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
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <li class="list-group-item bg-transparent border-bottom py-3 px-0">
                        <div class="d-flex  gap-3">
                            <div>
                                <img class="rounded" alt="Image placeholder" src="{{ Storage::url(auth('teacher')->user()->profile_image) }}" style="width: 100px">
                            </div>
                            <div class="flex-grow-1 border-end">
                                <h4 class="h5 fw-normal text-primary mb-0"><a href="#">Chris Wood</a></h4>
                                @foreach(auth('teacher')->user()->subjects as $subject)
                                    <span class="small text-info">
                                        {{ $subject->name }}
                                </span>
                                @endforeach
                                <div class="mt-4">
                                    <p class="small text-muted">Teach: {{ $class_count->classrooms_count }}
                                        <span class="fw-bold">{{ $class_count->classrooms_count <= 1 ? 'class' : 'classes' }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="h6 text-tertiary mb-3">Select your class:</h6>
                                <div class="d-flex align-items-center">
                                    <div class="col-6">
                                        <select name="" class="form-select" id="classroom">
                                            <option selected disabled>Select class</option>
                                            @foreach($teacher_class->classrooms as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="ms-3">
                                        <button type="submit" class="btn btn-success text-white" id="show-student-btn">Show students list</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </div>
            <div class="table-responsive mt-5">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">Name</th>
                        <th class="border-0">Status</th>
                        <th class="border-0 rounded-end">Reason Text</th>
                    </tr>
                    </thead>
                    <tbody id="result">
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

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#show-student-btn').on('click', function () {
        const class_id = $('#classroom').val();
        console.log(class_id);

        $.ajax({
            url: "{{ route('teacher.student_list') }}",
            type: 'POST',
            data: {
                id: class_id
            },
            success: function (data) {
                $('#result').html(data);
            }
        })
    })
</script>
