<div class="card border-0">
    <div class="card-body p-0">
        @forelse($feedbacks as $feedback)
            @foreach($feedback->parent_messages as $parent)
                <div class="card hover-state border-bottom rounded-0 rounded-top py-3">
                    <div class="card-body d-flex align-items-center flex-wrap flex-lg-nowrap py-0">
                        <div class="col-1 align-items-center px-0 d-none d-lg-flex">
                            <div class="form-check inbox-check me-2 mb-0"><input class="form-check-input" type="checkbox" value="" id="mailCheck1"> <label
                                    class="form-check-label"
                                    for="mailCheck1"></label></div>
                            <svg class="icon icon-sm rating-star d-none d-lg-inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        <div class="col-10 col-lg-2 ps-0 ps-lg-3 pe-lg-3">
                            <a href="#" class="d-flex align-items-center">
                                <img src="{{ asset('storage/avatars/' . $parent->profile_image) }}" class="avatar-sm rounded-circle me-3" alt="Avatar">
                                <span class="h6 fw-bold mb-0">{{ $parent->fullName }}</span>
                            </a>
                        </div>
                        <div class="col-2 col-lg-2 d-flex align-items-center justify-content-end px-0 order-lg-4">
                            <div class="text-muted small d-none d-lg-block">{{ $feedback->created_at->format('g:i A') }}</div>
                            <div class="dropdown ms-3">
                                <button type="button" class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                            <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        Archive </a><a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M2.94 6.412A2 2 0 002 8.108V16a2 2 0 002 2h12a2 2 0 002-2V8.108a2 2 0 00-.94-1.696l-6-3.75a2 2 0 00-2.12 0l-6 3.75zm2.615 2.423a1 1 0 10-1.11 1.664l5 3.333a1 1 0 001.11 0l5-3.333a1 1 0 00-1.11-1.664L10 11.798 5.555 8.835z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        Mark as read
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        Snooze
                                    </a>
                                    <div role="separator" class="dropdown-divider my-1"></div>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 d-flex align-items-center mt-3 mt-lg-0 ps-0">
                            <a href="./single-message.html" class="fw-normal text-gray-600-900 truncate-text">
                                <span class="fw-bold ps-lg-5">{{ $feedback->message }}</span>
                                {{--                                                        <span class="fw-bold d-none d-md-inline">We’ve noticed you haven’t set up email forwarding and we could help you</span>--}}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach($feedback->student_messages as $student)
                <div class="card hover-state border-bottom rounded-0 rounded-top py-3">
                    <div class="card-body d-flex align-items-center flex-wrap flex-lg-nowrap py-0">
                        <div class="col-1 align-items-center px-0 d-none d-lg-flex">
                            <div class="form-check inbox-check me-2 mb-0">
                                <input class="form-check-input" type="checkbox" value="" id="mailCheck1">
                                <label class="form-check-label" for="mailCheck1"></label>
                            </div>
                            <svg class="icon icon-sm rating-star d-none d-lg-inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        <div class="col-10 col-lg-2 ps-0 ps-lg-3 pe-lg-3">
                            <a href="#" class="d-flex align-items-center">
                                <img src="{{ asset('storage/avatars/' . $student->profile_image) }}" class="avatar-sm rounded-circle me-3" alt="Avatar">
                                <span class="h6 fw-bold mb-0">{{ $student->fullName }}</span>
                            </a>
                        </div>
                        <div class="col-2 col-lg-2 d-flex align-items-center justify-content-end px-0 order-lg-4">
                            <div class="text-muted small d-none d-lg-block">{{ $feedback->created_at->format('g:i A') }}</div>
                            <div class="dropdown ms-3">
                                <button type="button" class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                            <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        Archive </a><a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M2.94 6.412A2 2 0 002 8.108V16a2 2 0 002 2h12a2 2 0 002-2V8.108a2 2 0 00-.94-1.696l-6-3.75a2 2 0 00-2.12 0l-6 3.75zm2.615 2.423a1 1 0 10-1.11 1.664l5 3.333a1 1 0 001.11 0l5-3.333a1 1 0 00-1.11-1.664L10 11.798 5.555 8.835z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        Mark as read
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        Snooze
                                    </a>
                                    <div role="separator" class="dropdown-divider my-1"></div>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 d-flex align-items-center mt-3 mt-lg-0 ps-0">
                            <a href="./single-message.html" class="fw-normal text-gray-600-900 truncate-text">
                                <span class="fw-bold ps-lg-5">{{ $feedback->message }}</span>
                                {{--                                                        <span class="fw-bold d-none d-md-inline">We’ve noticed you haven’t set up email forwarding and we could help you</span>--}}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @empty
            <p>No message.</p>
        @endforelse

        <div class="row p-4">
            <div class="col-7 mt-1">Showing {{ $feedbacks->firstItem() }} - {{ $feedbacks->lastItem() }} of {{ $feedbacks->total() }}</div>
            <div class="col-5">
                <div class="btn-group float-end test">
                    <a href="{{ $feedbacks->previousPageUrl() }}" class="btn btn-gray-100 {{ $feedbacks->onFirstPage() ? 'disabled' : '' }}">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="{{ $feedbacks->nextPageUrl() }}" class="btn btn-gray-800 {{ $feedbacks->onLastPage() ? 'disabled' : '' }}">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
