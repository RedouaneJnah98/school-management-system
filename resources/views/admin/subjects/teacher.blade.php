<x-dashboard_layout>
    @section('title', 'Related Teacher(s)')
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
                <li class="breadcrumb-item active" aria-current="page">Subjects</li>
            </ol>
        </nav>
        <div>
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Subject Taught by.</h1>
                <p class="mb-0">Dozens of reusable components built to provide buttons, alerts, popovers, and more.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ route('admin.subject-teacher.store') }}" method="post">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-6 mb-4">
                                <p class="text-tertiary">Subject:</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="border overflow-auto p-3 w-100" style="height: 250px;">
                                        <div class="text-center pt-2 border mb-2 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="subject-all" id="select-subject">
                                                <label for="select-subject">Select All</label>
                                            </div>
                                        </div>
                                        <div class="text-center pt-2 border mb-4 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="subject-all" id="deselect-subject" checked>
                                                <label for="deselect-subject">Deselect All</label>
                                            </div>
                                        </div>

                                        @forelse($subjects as $subject)
                                            <div class="form-check">
                                                <input class="form-check-input" name="subject" type="checkbox" id="subject-{{ $subject->id }}" data-id="{{ $subject->id }}">
                                                <label class="form-check-label fw-light" for="subject-{{ $subject->id }}">
                                                    {{ $subject->name }}
                                                </label>
                                            </div>
                                        @empty
                                            <p class="text-center fw-light text-info">No enough data to show.</p>
                                        @endforelse

                                    </div>
                                    <div class="ms-2">
                                        <button class="btn btn-outline-gray-300 btn-sm" id="subject-btn"
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
                                <p class="text-tertiary">Taught By:</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="border overflow-auto p-3 w-100" style="height: 250px;">
                                        <div class="text-center pt-2 border mb-2 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="teacher-all" id="select-teacher">
                                                <label for="select-teacher">Select All</label>
                                            </div>
                                        </div>
                                        <div class="text-center pt-2 border mb-4 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="teacher-all" id="deselect-teacher" checked>
                                                <label for="deselect-teacher">Deselect All</label>
                                            </div>
                                        </div>

                                        @forelse($teachers as $teacher)
                                            <div class="form-check">
                                                <input class="form-check-input" name="teacher" type="checkbox" id="teacher-{{ $teacher->id }}" data-id="{{ $teacher->id }}">
                                                <label class="form-check-label fw-light" for="teacher-{{ $teacher->id }}">
                                                    {{ $teacher->fullName }}
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
                                <p class="text-tertiary">Selected:</p>
                                <div class="border overflow-scroll p-5 w-100" style="height: 250px">
                                    <div class="d-flex justify-content-between">
                                        <ul>
                                            <li class="h6 fw-bold">Subject:</li>
                                            <ul class="subject"></ul>
                                        </ul>
                                        <div class="border-end" style="max-height: 100%"></div>
                                        <ul>
                                            <li class="h6 fw-bold">Teacher(s):</li>
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
    $('#teacher-btn').on('click', function (event) {
        event.preventDefault();
        inputName('teacher', '.teachers', 'teacher_id[]');
    });
    checkboxAll('#select-teacher', '#deselect-teacher', 'teacher');

    $('#subject-btn').on('click', function (event) {
        event.preventDefault();
        inputName('subject', '.subject', 'subject_id');
    })
    checkboxAll('#select-subject', '#deselect-subject', 'subject');
</script>
