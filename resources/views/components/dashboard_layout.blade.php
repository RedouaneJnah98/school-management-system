@include('components.header')

<main class="content">
    {{ $slot }}

    <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
        <div class="row">
            <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                <p class="mb-0 text-center text-lg-start">© 2021-<span class="current-year"></span> <a class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Ajial School App</a>
                </p>
            </div>
            <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
                <!-- List -->
                <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
                    <li class="list-inline-item px-0 px-sm-2">
                        <a href="https://themesberg.com/about">About</a>
                    </li>
                    <li class="list-inline-item px-0 px-sm-2">
                        <a href="https://themesberg.com/themes">Upcoming Events</a>
                    </li>
                    <li class="list-inline-item px-0 px-sm-2">
                        <a href="https://themesberg.com/blog">Blog</a>
                    </li>
                    <li class="list-inline-item px-0 px-sm-2">
                        <a href="https://themesberg.com/contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</main>

<!-- Schedule JS files -->
<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<!-- Core -->
<x-scripts.layout/>

<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/request.js') }}"></script>

</body>

</html>
