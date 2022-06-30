<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <!-- <link rel="shortcut icon" href="{{ asset('media/favicons/favicon-im.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}"> -->


    <!-- Fonts and Styles -->
    @yield('css_before')
    <!-- <link rel="stylesheet" id="css-main" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700"> -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('css/dashmix.css') }}">

    @yield('css_after')
    <!-- Scripts -->
    {{--  <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>  --}}

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>CIFO Register</title>

    <link rel="stylesheet" href="{{ asset('/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('js/dashmix.app.js') }}"></script>

    <!-- Laravel Scaffolding JS -->
    <script src="{{ asset('js/laravel.app.js') }}"></script>

    @yield('js_after')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>


    <script src="{{ asset('/js/plugins/sweetalert2/sweetalert2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script>jQuery(function(){ Dashmix.helpers(['notify']); });</script>

    <script src="{{ asset('/js/plugins/custom/utilities.js') }}" type="text/javascript"></script>
</head>
<body class="bg-img">
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="bg-image" style="background-image: {{ ('media/photos/photo10@2x.jpg') }};">
                    <div class="row no-gutters justify-content-center bg-black-75">
                        <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                            <!-- Reminder Block -->
                            <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                                <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                                    <!-- Header -->
                                    <div class="mb-2 text-center">
                                        <a class="link-fx text-warning font-w700 font-size-h1" href="index.html">
                                            <span class="text-dark">CIFO </span><span class="text-primary"></span>
                                        </a>
                                        <p class="text-uppercase font-w700 font-size-sm text-muted">Register</p>
                                    </div>
                                    <!-- END Header -->
                                    <form id="form-login" action="/auth/register" method="post" id="login-form">
                                        @csrf    
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="name" required>
                                        </div> 
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{ old('email') }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" placeholder="Email" required>
                                        </div>  
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="phone" required>
                                        </div> 
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required>
                                            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Password Confirmation" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-hero-primary btn-block">Submit</button>
                                        </div>
                                    </form>
                                    <!-- END Reminder Form -->
                                </div>
                            </div>
                            <!-- END Reminder Block -->
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->


</body>


@if(Session::has('error'))

<script type="text/javascript">
    var errorLogin = {!! json_encode(Session::get('error')) !!};

    $(document).ready(function(){
        Dashmix.helpers('notify', {
            type: 'danger',
            icon: 'fa fa-times mr-1',
            message: errorLogin
        });
    });
</script>
@endif

@if(Session::has('success'))

<script type="text/javascript">
    var errorLogin = {!! json_encode(Session::get('success')) !!};

    $(document).ready(function(){
        Dashmix.helpers('notify', {
            type: 'success',
            icon: 'fa fa-check mr-1',
            message: errorLogin,
            allow_dismiss: true,
            timer: 15000
        });
    });
</script>
@endif

@if (count($errors) > 0)
<script type="text/javascript">
    @foreach ($errors->all() as $error)
        $(document).ready(function(){
            Dashmix.helpers('notify', {
                type: 'danger',
                icon: 'fa fa-times mr-1',
                message: '{{ $error }}',
                allow_dismiss: true,
                timer: 15000
            });
        });
    @endforeach
</script>
@endif

@if(isset($data->error))
    @if(count($data->error) > 0)
    <script type="text/javascript">
        @foreach ($data->error->all() as $error)
            $(document).ready(function(){
                Dashmix.helpers('notify', {
                    type: 'danger',
                    icon: 'fa fa-times mr-1',
                    message: '{{ $error }}',
                    allow_dismiss: true,
                    timer: 15000
                });
            });
        @endforeach
    </script>
    @endif
@endif
</html>
