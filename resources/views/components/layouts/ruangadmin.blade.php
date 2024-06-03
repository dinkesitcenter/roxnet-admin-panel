<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>{{ $title }}</title>
        <link href="{{ asset('ruangadmin/dist/img/logo/logo.png') }}" rel="shortcut icon" type="image/x-icon">
        <link href="{{ asset('ruangadmin/dist/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('ruangadmin/dist/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('ruangadmin/dist/css/ruang-admin.min.css') }}" rel="stylesheet">
        {{ ($head) ?? '' }}
            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body id="page-top">
        <div id="wrapper">

            {{-- sidebar --}}
            <x-ruangadmin.sidebar></x-ruangadmin.sidebar>
            
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    {{-- topbar --}}
                    <livewire:layout.topbar />

                    {{-- container fluid --}}
                    <div class="container-fluid" id="container-wrapper">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </div>

                        {{-- Main content --}}
                        {{ $slot }}
                    </div>
                </div>

                {{-- Footer --}}
                <footer class="sticky-footer bg-white mt-3">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                        <span>copyright &copy; {{ date("Y") }} - developed by
                            <b><a href="https://github.com/roxnet" target="_blank">Risman</a></b>
                        </span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        {{-- Scroll to top --}}
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="{{ asset('ruangadmin/dist/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('ruangadmin/dist/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('ruangadmin/dist/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('ruangadmin/dist/js/ruang-admin.min.js') }}"></script>
        <script src="{{ asset('ruangadmin/dist/vendor/chart.js/Chart.min.js') }}"></script>
        {{ ($script) ?? '' }}
        @stack('scripts')
    </body>
</html>