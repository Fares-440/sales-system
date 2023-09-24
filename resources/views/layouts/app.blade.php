<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    <style>
        html {
            --scrollbarBG: #CFD8DC;
            --thumbBG: #90A4AE;
        }

        body::-webkit-scrollbar,
        .nice-scrollbar::-webkit-scrollbar {
            width: 11px;
        }

        body,
        .nice-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: var(--thumbBG) var(--scrollbarBG);
        }

        body::-webkit-scrollbar-track,
        .nice-scrollbar::-webkit-scrollbar-track {
            background: var(--scrollbarBG);
        }

        body::-webkit-scrollbar-thumb,
        .nice-scrollbar::-webkit-scrollbar-thumb {
            background-color: var(--thumbBG);
            border-radius: 6px;
            border: 3px solid var(--scrollbarBG);
        }

        .custom-font {
            font-size: 1.2rem
        }

        fieldset {
            border: 2px solid #dbd9d9;
            border-radius: 10px;
            position: relative;
        }

        legend {
            background: white;
            position: absolute;
            top: -20px;
            border-radius: 10px;
            padding: 3px 5px;
            width: fit-content;
            right: 22px;
        }
    </style>
</head>

<body>

    <div class="wrapper">

        <!--=================preloader================ -->

        <div id="pre-loader">
            <img src="{{ asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--================preloader================= -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--==============Main content=================== -->
        <!-- main-content -->
        <div class="content-wrapper">

            @yield('page-header')
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">@yield('PageTitle')</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"
                                    class="default-color">{{ trans('main_trans.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">@yield('PageTitle')</li>
                        </ol>
                    </div>
                </div>
                @yield('content')
                @if (isset($slot))
                    {{ $slot }}
                @endif

                {{-- {{ $slot }} --}}
                <!--================wrapper================= -->

                <!--==================footer=============== -->

                @include('layouts.footer')
            </div><!-- main content wrapper end-->
        </div>
    </div>
    </div>

    <!--==================footer=============== -->
    <livewire:modals />
    @livewireScripts
    @include('layouts.footer-scripts')
    @stack('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
