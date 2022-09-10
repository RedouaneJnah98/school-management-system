<x-dashboard_layout>
    @section('title', 'Edit Class')
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
                    <form action="{{ route('admin.classrooms.update', $classroom->id) }}" method="post">
                        @method('PUT')
                        @csrf

                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-6 mb-4">
                                <label for="name">Classroom Name</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $classroom->name }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6 mb-4">
                                <label for="year">Year</label>
                                <select class="form-select @error('year') is-invalid @enderror" name="year" id="year">
                                    <option @selected($classroom->year)>{{ $classroom->year }}</option>
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
                                <label for="group">Groups</label>
                                <select class="form-select @error('group_id') is-invalid @enderror" name="group_id" id="group">
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}" @selected($group->name)>{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6 mb-4">
                                <label for="status">Status</label>
                                <div class="input-group">
                                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                        <option @selected($classroom->status)>{{ $classroom->status }}</option>
                                        @if($classroom->status === 'Active')
                                            <option>Not Active</option>
                                        @else
                                            <option>Active</option>
                                        @endif
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
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
<x-modals.messages.failed/>

