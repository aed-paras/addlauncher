<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Styles -->
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>

    <!--Import font awesome-->
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">

    @yield('import_styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/admin-style.css') }}"  media="screen,projection"/>
    @yield('custom_styles')

</head>
<body>

    @include('admin.navigation.admin-nav')

    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/iziToast.min.js') }}"></script>

    @yield('import_scripts')
  
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/admin-script.js') }}"></script>
    @if(session('message'))
        <?php $message = Session::get('message'); ?>
        <script>
            iziToast.{{ $message['type'] }}({
                title: "{{ $message['title'] }}",
                message: "{{ $message['message'] }}",
                position: "{{ $message['position'] }}"
            });
        </script>
    @endif
    @yield('custom_scripts')

</body>
</html>

{{-- 
<a href="{{ route('logout') }}"
    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form> --}}
