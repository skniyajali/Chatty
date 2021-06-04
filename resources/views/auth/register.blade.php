<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- Head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
        <title>Chatty - Realtime Chat Application</title>

        <!-- Template core CSS -->
        
        <link href="{{ asset('css/template.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/template.dark.min.css') }}" rel="stylesheet" media="(prefers-color-scheme: dark)">
        
        
        
    </head>
    <!-- Head -->

    <body>

        <div class="layout">

            <div class="container d-flex flex-column">
                <div class="row align-items-center justify-content-center no-gutters min-vh-100">

                    <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11">

                        <!-- Heading -->
                        <h1 class="font-bold text-center">Sign up</h1>

                        <!-- Text -->
                        <p class="text-center mb-6">Welcome to Chatty.</p>

                        <!-- Form -->
                        <form class="mb-6" action="{{ route('register') }}" method="post">
                            @csrf
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="font-weight-bold">Name</label>
                                <input type="text" class="form-control form-control-lg @error('name') border border-primary @enderror" id="name"  name="name" value="{{ old('name') }}" placeholder="Enter your name">
                                @error('name')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Name -->
                            <div class="form-group">
                                <label for="username" class="font-weight-bold">Username</label>
                                <input type="text" class="form-control form-control-lg @error('username') border border-primary @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username">
                                @error('username')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email Address</label>
                                <input type="email" class="form-control form-control-lg @error('email') border border-primary @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                                @error('email')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" class="form-control form-control-lg @error('password') border border-primary @enderror" id="password" name="password" placeholder="Enter your password">
                                @error('password')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password_confirmation" class="font-weight-bold">Confirm Password</label>
                                <input type="password" class="form-control form-control-lg @error('password_confirmation') border border-primary @enderror" id="password_confirmation" name="password_confirmation" placeholder="Enter your password">
                                @error('password_confirmation')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-lg btn-block btn-primary" type="submit">Sign up</button>
                        </form>

                        <!-- Text -->
                        <p class="text-center">
                            Already have an account? <a href="{{ route('login') }}">Sign in</a>.
                        </p>

                    </div>
                </div> <!-- / .row -->
            </div>

        </div><!-- .layout -->

        <!-- Scripts -->
        <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/plugins/plugins.bundle.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        <!-- Scripts -->

    </body>
</html>