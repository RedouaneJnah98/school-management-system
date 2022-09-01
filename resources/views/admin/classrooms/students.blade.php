<x-dashboard_layout>
    @section('title', 'Add Classroom Student')
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
                <li class="breadcrumb-item active" aria-current="page">Classroom Student</li>
            </ol>
        </nav>
        <div>
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Add Classroom Student</h1>
                <p class="mb-0">Add students to the classroom.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ route('admin.classroom-student.store') }}" method="post">
                        @csrf

                        <div class="row mb-1">
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <p class="text-tertiary">Classroom</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="border overflow-auto p-3 w-100" style="height: 250px;">
                                        <div class="text-center pt-2 border mb-2 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="classroom-all" id="select-classroom">
                                                <label for="select-classroom">Select All</label>
                                            </div>
                                        </div>
                                        <div class="text-center pt-2 border mb-4 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="classroom-all" id="deselect-classroom" checked>
                                                <label for="deselect-classroom">Deselect All</label>
                                            </div>
                                        </div>

                                        @forelse($classrooms as $classroom)
                                            <div class="form-check">
                                                <input class="form-check-input" name="classroom" type="checkbox" id="{{ $classroom->id }}">
                                                <label class="form-check-label fw-light student" for="{{ $classroom->id }}">
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

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <p class="text-tertiary">Students</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="border overflow-auto p-3 w-100" style="height: 250px">
                                        <div class="text-center pt-2 border mb-2 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="student-all" id="select-all">
                                                <label for="select-all">Select All</label>
                                            </div>
                                        </div>
                                        <div class="text-center pt-2 border mb-4 border-2">
                                            <div>
                                                <input type="radio" class="form-check-input" name="student-all" id="deselect-all" checked>
                                                <label for="deselect-all">Deselect All</label>
                                            </div>
                                        </div>

                                        @forelse($students as $student)
                                            <div class="form-check">
                                                <input class="form-check-input" name="student" type="checkbox"
                                                       id="{{ $student->id }}" value="{{ $student->fullName }}">
                                                <label class="form-check-label fw-light" for="{{ $student->id }}">
                                                    {{ $student->fullName }}
                                                </label>
                                            </div>
                                        @empty
                                            <p class="text-center fw-light text-info">No enough data to show.</p>
                                        @endforelse
                                    </div>
                                    <div class="ms-2">
                                        <button class="btn btn-outline-gray-300 btn-sm" id="student-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Move selected">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <p class="text-tertiary">Selected class</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="me-2">
                                        <button class="btn btn-outline-gray-300 btn-sm" id="student-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deselect">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="border overflow-scroll p-3 w-100" style="height: 250px">
                                        <ul>
                                            <li class="h6 fw-bold">Classroom:</li>
                                            <ul class="classroom">
                                            </ul>
                                        </ul>
                                        <hr>
                                        <ul>
                                            <li class="h6 fw-bold">Students:</li>
                                            <ul class="students"></ul>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary rounded-pill">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard_layout>

{{-- Modals --}}
<x-modals.failed/>

<script>
    $('#student-btn').on('click', function (e) {
        e.preventDefault();

        inputName('student', '.students', 'student_id[]');
    })
    checkboxAll('#select-all', '#deselect-all', 'student');
    $('#classroom-btn').on('click', function (e) {
        e.preventDefault();

        inputName('classroom', '.classroom', 'classroom_id');
    })
    checkboxAll('#select-classroom', '#deselect-classroom', 'classroom');

    function inputName(name, className, postName) {
        let inputNameChecked = $(`input:checkbox[name="${name}"]:checked`);
        let labelText = $(inputNameChecked).next().text();
        let trimmedLabel = labelText.replaceAll('  ', '');
        let arr = trimmedLabel.split('\n');
        let newArr = arr.filter(function (value) {
            return value != null && value !== "";
        });
        let hiddenInput = '';

        $.each(inputNameChecked, function () {
            let id = $(this).attr('id');
            // console.log(id)
            hiddenInput = `<input type="hidden" name="${postName}" value="${id}" />`;
            $(`${className}`).append(hiddenInput);
            console.log(hiddenInput);
        })
        $.each(newArr, function (i, item) {
            let html = '<li class="fw-light">' + item + '</li>';

            $.each(inputNameChecked, function () {
                $(`input:checkbox[name="${name}"]:checked`).parent().remove();
            });
            $(`${className}`).append(html);
        })
    }

    function checkboxAll(selectAll, deselectAll, name) {
        $(`${selectAll}`).on('click', function () {
            $(`input:checkbox[name=${name}]`).prop('checked', true);
        });
        $(`${deselectAll}`).on('click', function () {
            $(`input:checkbox[name=${name}]`).prop('checked', false);
        });
    }

</script>
