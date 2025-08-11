<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Website')</title>
</head>
<body style="margin:0; font-family: Arial, sans-serif;">

    {{-- Topbar --}}
    @include('Components.Topbar')

    {{-- Navbar --}}
    @include('Components.Navbar')

    <div style="display: flex;">

        {{-- Sidebar (changes per page) --}}
        <div style="width: 250px; background-color: #004aad; color: white; min-height: 100vh;">
            @yield('sidebar')
        </div>

        {{-- Page content --}}
        <div style="flex: 1; padding: 20px;">
            @yield('content')
        </div>

    </div>

    {{-- Footer --}}
    @include('Components.Footer')

</body>
</html>
