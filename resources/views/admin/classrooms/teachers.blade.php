<x-dashboard_layout>
    {{-- sidebar --}}
    @include('components.admin._sidebar')

    {{-- Navbar --}}
    @include('components.settings.admin.navbar')

    <div class="py-4">
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
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Classroom Teacher</li>
            </ol>
        </nav>
        <div>
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Add Classroom Teacher</h1>
                <p class="mb-0">Select classes taught by every teacher in the school.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ route('admin.classroom-teacher.store') }}" method="post">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-6 mb-4">
                                <p class="text-tertiary">Classrooms</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="border overflow-auto p-3 w-100" style="height: 250px">
                                        <div class="text-center pt-2 border mb-2 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="classroom-all" id="select-all-classrooms">
                                                <label for="select-all-classrooms">Select All</label>
                                            </div>
                                        </div>
                                        <div class="text-center pt-2 border mb-4 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="classroom-all" id="deselect-all-classrooms" checked>
                                                <label for="deselect-all-classrooms">Deselect All</label>
                                            </div>
                                        </div>

                                        @forelse($classrooms as $classroom)
                                            <div class="form-check">
                                                <input class="form-check-input" name="classroom" type="checkbox"
                                                       id="classroom-{{ $classroom->id }}" data-id="{{ $classroom->id }}" value="{{ $classroom->name }}">
                                                <label class="form-check-label fw-light" for="classroom-{{ $classroom->id }}">
                                                    {{ $classroom->name }}
                                                </label>
                                            </div>
                                        @empty
                                            <p class="text-center fw-light text-info">No enough data to show.</p>
                                        @endforelse
                                    </div>
                                    <div class="ms-2">
                                        <button class="btn btn-outline-gray-300 btn-sm" id="classroom-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Move selected">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 mb-4">
                                <p class="text-tertiary">Teachers</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="border overflow-auto p-3 w-100" style="height: 250px">
                                        <div class="text-center pt-2 border mb-2 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="teacher-all" id="select-all-teachers">
                                                <label for="select-all-teachers">Select All</label>
                                            </div>
                                        </div>
                                        <div class="text-center pt-2 border mb-4 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="teacher-all" id="deselect-all-teachers" checked>
                                                <label for="deselect-all-teachers">Deselect All</label>
                                            </div>
                                        </div>

                                        @forelse($teachers as $teacher)
                                            <div class="form-check">
                                                <input class="form-check-input" name="teacher" type="checkbox"
                                                       id="teacher-{{ $teacher->id }}" data-id="{{ $teacher->id }}" value="{{ $teacher->fullName  }}">
                                                <label class="form-check-label fw-light" for="teacher-{{ $teacher->id }}">
                                                    {{ $teacher->fullName }}
                                                    @foreach($teacher->subjects as $subject)
                                                        <p class="text-sm text-info">{{ $subject->name }}</p>
                                                    @endforeach
                                                </label>
                                            </div>
                                        @empty
                                            <p class="text-center fw-light text-info">No enough data to show.</p>
                                        @endforelse
                                    </div>
                                    <div class="ms-2">
                                        <button class="btn btn-outline-gray-300 btn-sm" id="teacher-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Move selected">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-sm-6 mb-4">
                                <p class="text-tertiary">Selected class</p>
                                <div class="border overflow-scroll p-5 w-100" style="height: 250px">
                                    <div class="d-flex justify-content-between">
                                        <ul>
                                            <li class="h6 fw-bold">Classroom:</li>
                                            <ul class="classroom"></ul>
                                        </ul>
                                        <div class="border-end" style="max-height: 100%"></div>
                                        <ul>
                                            <li class="h6 fw-bold">Teachers:</li>
                                            <ul class="teachers"></ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard_layout>

{{-- Modals --}}
<x-modals.messages.failed/>

<script>
    $('#classroom-btn').on('click', function (e) {
        e.preventDefault();

        inputName('classroom', '.classroom', 'classroom_id');
    })
    checkboxAll('#select-all-classrooms', '#deselect-all-classrooms', 'classroom');

    $('#teacher-btn').on('click', function (e) {
        e.preventDefault();

        inputName('teacher', '.teachers', 'teacher_id[]');
    })
    checkboxAll('#select-all-teachers', '#deselect-all-teachers', 'teacher');
</script>

