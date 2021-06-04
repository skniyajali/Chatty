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
                @auth
                    
                @endauth
                @guest                 
                <div class="row align-items-center justify-content-center no-gutters min-vh-100">

                    <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11">

                        <!-- Heading -->
                        <h1 class="font-bold text-center">Sign in</h1>

                        <!-- Text -->
                        <p class="text-center mb-6">Welcome to the official Chat web-client.</p>
                        @if(session('status'))
                            <!-- Error -->
                            <p class="text-center mt-2 mb-3 text-danger">{{ session('status') }}</p>
                        @endif
                        <!-- Form -->
                        <form class="mb-6" action="{{ route('login') }}" method="post">
                            @csrf
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

                            <div class="form-group d-flex justify-content-between">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="checkbox-remember">
                                    <label class="custom-control-label" for="checkbox-remember">Remember me</label>
                                </div>
                                <a href="#">Reset password</a>
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-lg btn-block btn-primary" type="submit">Sign in</button>
                        </form>

                        <!-- Text -->
                        <p class="text-center">
                            Don't have an account yet <a href="{{ route('register') }}">Sign up</a>.
                        </p>

                    </div>
                </div> <!-- / .row -->   
                @endguest
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