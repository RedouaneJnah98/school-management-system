<x-dashboard_layout>
    {{-- sidebar --}}
    @include('components.admin._sidebar')

    <main class="content">
        {{-- Navbar --}}
        @include('components.navbar')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Student</li>
                </ol>
            </nav>
            <div>
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Add Student</h1>
                    <p class="mb-0">Dozens of reusable components built to provide buttons, alerts, popovers, and more.</p>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Full Name</th>
                            <th class="border-0">Email Address</th>
                            <th class="border-0">Phone Number</th>
                            <th class="border-0">Parent Name</th>
                            <th class="border-0">Gender</th>
                            <th class="border-0">Date Of Join</th>
                            <th class="border-0 rounded-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/united-states-of-america.svg">
                                    <div><span class="h6">United States</span></div>
                                </a>
                            </td>
                            <td class="border-0 fw-bold">106</td>
                            <td class="border-0 text-danger">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">5</span>
                                </div>
                            </td>
                            <td class="border-0 fw-bold">
                                3
                            </td>
                            <td class="border-0">
                                =
                            </td>
                            <td class="border-0 fw-bold">
                                32
                            </td>
                            <td class="border-0 text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">3</span>
                                </div>
                            </td>
                        </tr>
                        <!-- End of Item -->

                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/canada.svg">
                                    <div><span class="h6">Canada</span></div>
                                </a>
                            </td>
                            <td class="border-0 fw-bold">76</td>
                            <td class="border-0 text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">17</span>
                                </div>
                            </td>
                            <td class="border-0 fw-bold">
                                4
                            </td>
                            <td class="border-0">
                                =
                            </td>
                            <td class="border-0 fw-bold">
                                30
                            </td>
                            <td class="border-0 text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">3</span>
                                </div>
                            </td>
                        </tr>
                        <!-- End of Item -->

                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/united-kingdom.svg">
                                    <div><span class="h6">United Kingdom</span></div>
                                </a>
                            </td>
                            <td class="border-0 fw-bold">147</td>
                            <td class="border-0 text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">10</span>
                                </div>
                            </td>
                            <td class="border-0 fw-bold">
                                5
                            </td>
                            <td class="border-0">
                                =
                            </td>
                            <td class="border-0 fw-bold">
                                34
                            </td>
                            <td class="border-0 text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">7</span>
                                </div>
                            </td>
                        </tr>
                        <!-- End of Item -->

                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/france.svg">
                                    <div><span class="h6">France</span></div>
                                </a>
                            </td>
                            <td class="border-0 fw-bold">112</td>
                            <td class="border-0 text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">3</span>
                                </div>
                            </td>
                            <td class="border-0 fw-bold">
                                5
                            </td>
                            <td class="border-0 text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">1</span>
                                </div>
                            </td>
                            <td class="border-0 fw-bold">
                                34
                            </td>
                            <td class="border-0 text-danger">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">2</span>
                                </div>
                            </td>
                        </tr>
                        <!-- End of Item -->

                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/japan.svg">
                                    <div><span class="h6">Japan</span></div>
                                </a>
                            </td>
                            <td class="border-0 fw-bold">115</td>
                            <td class="border-0 text-danger">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">12</span>
                                </div>
                            </td>
                            <td class="border-0 fw-bold">
                                6
                            </td>
                            <td class="border-0 text-danger">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">1</span>
                                </div>
                            </td>
                            <td class="border-0 fw-bold">
                                37
                            </td>
                            <td class="border-0 text-danger">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">5</span>
                                </div>
                            </td>
                        </tr>
                        <!-- End of Item -->

                        <!-- Item -->
                        <tr>
                            <td class="border-0">
                                <a href="#" class="d-flex align-items-center">
                                    <img class="me-2 image image-small rounded-circle" alt="Image placeholder" src="../../assets/img/flags/germany.svg">
                                    <div><span class="h6">Germany</span></div>
                                </a>
                            </td>
                            <td class="border-0 fw-bold">220</td>
                            <td class="border-0 text-danger">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">56</span>
                                </div>
                            </td>
                            <td class="border-0 fw-bold">
                                7
                            </td>
                            <td class="border-0 text-danger">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">3</span>
                                </div>
                            </td>
                            <td class="border-0 fw-bold">
                                30
                            </td>
                            <td class="border-0 text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="fw-bold">2</span>
                                </div>
                            </td>
                        </tr>
                        <!-- End of Item -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</x-dashboard_layout>
