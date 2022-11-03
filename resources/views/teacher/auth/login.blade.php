<x-layout>
    @section('title', 'Teacher Portal')

    <main>
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 text-black px-5 mt-5">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/img/icons/email-logo.svg') }}" width="300" alt="logo">
                        </a>

                        <div class="d-flex align-items-center h-custom-2 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                            <form action="{{ route('teacher.check') }}" method="post" style="width: 500px;">
                                @csrf

                                <div class="mb-4">
                                    <h3 class="fw-bold text-primary">Sign In</h3>
                                    <small class="text-gray-500">This is space is reserved only for teachers, enter your email address and password to access your account. </small>
                                </div>

                                <div class="d-flex justify-content-between gap-4">
                                    <div class="form-outline mb-2 col-lg-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label small" for="email">Email address</label>
                                            </div>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your email address"/>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-outline col-lg-6">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label small" for="password">Password</label>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="form-text text-muted link-primary small">Forgot password?</a>
                                            </div>
                                        </div>

                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Your password"/>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-check mt-0">
                                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember">
                                    <label class="form-check-label text-sm mb-0" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <div class="pt-1 mt-4" style="width: 100px">
                                    <button class="btn btn-primary rounded-pill w-100" type="submit">Sign in</button>
                                </div>
                            </form>

                        </div>

                    </div>
                    <div class="col-sm-6 px-0 d-none d-sm-block">
                        <img src="{{ asset('assets/img/pages/teacher-login.jpg') }}"
                             alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-layout>

{{--Modal--}}
<x-modals.messages.failed/>
