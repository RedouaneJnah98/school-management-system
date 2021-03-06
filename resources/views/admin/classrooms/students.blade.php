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
                            <div class="col-lg-6 col-sm-6 mb-4">
                                <label for="classroom">Classroom</label>
                                <select class="form-select @error('classroom_id') is-invalid @enderror" name="classroom_id" id="classroom">
                                    <option selected disabled>Select A Class</option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                                @error('classroom_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="student">Student</label>
                                <select class="form-select js-example-basic-multiple @error('student_id') is-invalid @enderror" name="student_id[]" multiple="multiple" id="student">
                                    <option selected disabled>Select A Student</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->fullName }}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="btn btn-primary">Create</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard_layout>

{{-- Modals --}}
<x-modals.failed/>

<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>
