<a class="dropdown-item d-flex align-items-center" href="{{ route('student.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
        </path>
    </svg>
    Logout
</a>
<form action="{{ route('student.logout') }}" method="post" id="logout-form">@csrf</form>
