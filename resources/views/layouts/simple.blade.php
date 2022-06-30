<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>CIFO Dashboard - @yield('title')</title>

        <meta name="description" content="Paspor">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <!-- <link rel="shortcut icon" href="{{ asset('media/favicons/favicon-im.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}"> -->

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="{{ asset('/js/plugins/select2/css/select2.min.css') }}"> 
        <!-- <link rel="stylesheet" id="css-main" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700"> -->
        <link rel="stylesheet" id="css-theme" href="{{ asset('/css/dashmix.css') }}">
        <link rel="stylesheet" id="css-plugin-table" href="{{ asset('/js/plugins/datatables/dataTables.bootstrap4.css') }}"> 
        <link rel="stylesheet" href="{{ asset('/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/responsive.bootstrap.min.css') }}">  
        <link rel="stylesheet" href="{{ asset('/css/responsive.bootstrap4.min.css') }}"> 

        <!-- for dialog -->
        <link rel="stylesheet" href="{{ asset('/css/themes/xwork.css') }}">
        <link rel="stylesheet" href="{{ asset('/js/plugins/sweetalert2/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" />
        @yield('css_after')
        <!-- Scripts -->
        
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
        <script src="{{ asset('/js/dashmix.app.js') }}?time=random" type="text/javascript"></script> 
        <script src="{{ asset('/js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}?time=random" type="text/javascript"></script>        
        <script src="{{ asset('/js/plugins/chart.js/Chart.bundle.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('/js/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/plugins/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/plugins/datatables/buttons/dataTables.buttons.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/plugins/datatables/buttons/buttons.print.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/plugins/datatables/buttons/buttons.html5.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/plugins/datatables/buttons/buttons.flash.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/plugins/datatables/buttons/buttons.colVis.min.js') }}" type="text/javascript"></script>
        <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
       
        <!-- for dialog -->
        <script src="{{ asset('/js/plugins/es6-promise/es6-promise.auto.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/plugins/sweetalert2/sweetalert2.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/plugins/jquery-validation/jquery.validate.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/plugins/jquery-validation/additional-methods.js') }}" type="text/javascript"></script>    
        <script src="{{ asset('./js/laravel.app.js') }}?time=random" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

        <script>jQuery(function(){ Dashmix.helpers(['notify']); });</script>

        <script src="{{ asset('/js/plugins/custom/utilities.js') }}" type="text/javascript"></script>    

        @yield('js_before')
        <style>
            .img-logo {
                width: 142px;
            }
        </style>
    </head>
    <body>
        @include('layouts.utility.loader')
        <!-- <section id="loader" class="hide">
            <div class="overlay top"></div>
            <div class="spinner">
                <div class="cube1"></div>
                <div class="cube2"></div>
            </div>
        </section> -->
        <div id="page-container" class="sidebar-o side-scroll page-header-fixed page-header-dark main-content-boxed">
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header (mini Sidebar mode) -->
                <div class="smini-visible-block">
                    <div class="content-header bg-header-dark">
                        <!-- Logo -->
                        <a class="link-fx font-size-lg text-white" href="#">
                            <span class="text-white-75">X</span><span class="text-white">B</span>
                        </a>
                        <!-- END Logo -->
                    </div>
                </div>
                <!-- END Side Header (mini Sidebar mode) -->

                <!-- Side Header (normal Sidebar mode) -->
                <div class="smini-hidden">
                    <div class="content-header justify-content-lg-center bg-header-dark">
                        <!-- Logo -->
                        <a class="custom link-fx font-w600 font-size-lg logo-hover" href="/profile">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <span style="color: #ffffff; !important;">CIFO</span>
                                <!-- <img class="img-logo" src="{{ asset('/media/logo.png')}}" alt="Imigrasi"> -->
                            </div>
                        </a>

                        <!-- END Logo -->


                        <!-- Options -->
                        <div class="d-lg-none">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                </div>
                <!-- END Side Header (normal Sidebar mode) -->

                <!-- Side Actions -->
                <div class="content-side content-side-full text-center bg-body-light">
                    <div class="smini-hide">
                        <img class="img-avatar" src="{{ asset('media/avatars/avatar10.jpg') }} " alt="">
                        <div class="mt-3 font-w600">Admin</div>
                    </div>
                </div>
                <!-- END Side Actions -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">


                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{Request::segment(1) == 'transfer-wallet' ? 'active' : ''}}" href="/transfer-wallet">
                                <span class="nav-main-link-name">Transfer Wallet</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{Request::segment(1) == 'history-wallet' ? 'active' : ''}}" href="/history-wallet">
                                <span class="nav-main-link-name">History Wallet</span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div>
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-stream fa-flip-horizontal"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>

                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="far fa-fw fa-user-circle"></i> -->
                                <!-- <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i> -->
                                <i class="far fa-fw fa-user-circle"></i>
                                <span class="d-none d-sm-inline-block">{{ Session::get('user')->name ?? '' }}</span>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                                    <div class="pt-2">
                                        <a class="text-white font-w600" href="#"></a>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item" href="/profile">
                                        <i class="far fa-fw fa-user mr-1"></i> Profile
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout">
                                        <i class="fa fa-fw fa-arrow-alt-circle-left mr-1"></i> Log Out
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-primary">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0" placeholder="Search.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary-dark">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                            <a class="font-w600" href="#" target="_blank">CIFO </a> &copy; <span data-toggle="year-copy">2022</span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->

</div>
<!-- END Page Container -->
        <!-- END Page Container -->

        @yield('js_after')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

    </body>
</html>




<script src="{{ asset('/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script>jQuery(function(){ Dashmix.helpers([ 'select2', 'datepicker' ]); });</script>
@if(Session::has('error'))

<script type="text/javascript">
    var errorLogin = {!! json_encode(Session::get('error')) !!};

    $(document).ready(function(){
        Dashmix.helpers('notify', {
            type: 'danger',
            icon: 'fa fa-check mr-1',
            message: errorLogin,
            allow_dismiss: true,
            timer: 15000
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