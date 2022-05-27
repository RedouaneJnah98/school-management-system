<x-dashboard_layout>
    {{-- sidebar --}}
    @include('components.admin._sidebar')

    <main class="content">
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
                    <li class="breadcrumb-item active" aria-current="page">Classrooms</li>
                </ol>
            </nav>
            <div>
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Add Classroom</h1>
                    <p class="mb-0">Dozens of reusable components built to provide buttons, alerts, popovers, and more.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <!-- Form -->
                        <form action="{{ route('admin.classes.store') }}" method="post">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-lg-6 col-sm-6 mb-4">
                                    <label for="name">Branch Name</label>
                                    <input type="text" id="name" class="form-control @error('branch') is-invalid @enderror" name="branch"
                                           placeholder="Economics">
                                    @error('branch')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-6 mb-4">
                                    <label for="year">Year</label>
                                    <select class="form-select @error('year') is-invalid @enderror" name="year" id="year">
                                        <option selected disabled>Select A Year</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                    </select>
                                    @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-6 mb-4">
                                    <label for="teacher">Teached by</label>
                                    <select class="form-select @error('teacher_id') is-invalid @enderror" name="teacher_id" id="teacher">
                                        <option selected disabled>Select A Teacher</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->firstname . ' ' . $teacher->lastname }}</option>
                                        @endforeach
                                    </select>
                                    @error('teacher_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-sm-6 mb-4">
                                    <label for="status">Status</label>
                                    <div class="input-group">
                                        <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                            <option selected disabled>Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="not active">Not Active</option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 mb-4">
                                    <label for="remark">Remark</label>
                                    <input type="text" id="remark" class="form-control @error('remark') is-invalid @enderror" name="remark" placeholder="Amazing">
                                    @error('remark')
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

    </main>
</x-dashboard_layout>

{{-- Modals --}}
<x-modals.failed/>

