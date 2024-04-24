@extends('layout')

@section('content1')

    <!-- HERO SECTION -->
    <div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('images/logo.png') }}')" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <!-- Content for the hero section can be added here -->
                </div>
            </div>
        </div>
    </div>

    <!-- LOGIN SECTION -->
    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-5">
                    <form method="POST" action="{{ route('login') }}" class="appointment-form">
                        @csrf
                        <h3 class="mb-3">Login</h3>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>

                     {{--   <div class="form-group d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                            </div>

                            <div>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            </div>
                        </div>--}}

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block py-3 px-4">Login</button>
                        </div>
                        <div class="text-center">
                            <p class="mt-3">
                                Don't have an account? <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">Create one</a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection
