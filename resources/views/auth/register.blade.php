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

    <!-- REGISTRATION SECTION -->
    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-5">
                    <form method="POST" action="{{ route('register') }}" class="appointment-form">
                        @csrf

                        <h3 class="mb-3">Register</h3>

                        <!-- Name -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block py-3 px-4">Register</button>
                        </div>

                        <div class="form-group text-center">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
