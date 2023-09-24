<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->

@yield('css')
<!--- Style css -->
{{-- <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet"> --}}
<link rel="stylesheet" href="{{asset('css/wizard.css')}}">
{{-- fontawesome 6 links --}}
<link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
@livewireStyles
{{-- <livewire:styles /> --}}
