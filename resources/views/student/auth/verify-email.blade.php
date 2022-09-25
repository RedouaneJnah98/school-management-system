<x-layout>
    @section('title', 'Email Verification')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="card py-5 px-4">
                <div class="d-flex align-items-center">
                    <div>
                        <h4 class="text-tertiary">Please verify your email!</h4>
                        <p class="text-gray-500 fw-light mt-2 mb-4">
                            {{ __('Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </p>
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 alert alert-success">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
                        <form action="{{ route('student.verification.send') }}" method="post">
                            @csrf
                            <button class="btn btn-info rounded-pill">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </form>
                    </div>
                    <div class="ms-5">
                        <img src="{{ asset('assets/img/email-verification.svg') }}" alt="illustration">
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-layout>
