<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Website')</title>
</head>
<body style="margin:0; font-family: Arial, sans-serif;">

   

    {{-- Navbar --}}
    <div>@include('Components.Navbar')</div>
    

    <div style="display: flex;">

        {{-- Sidebar (changes per page) --}}
        <div style=" color: white; min-height: 100vh;">
            @yield('sidebar')
        </div>

        {{-- Page content --}}
        <div style="flex: 1; margin-left:230px; margin-top:20px; padding: 20px;">
            @yield('content')
        </div>

    </div>

    {{-- Footer --}}
    @include('Components.Footer')

</body>
</html>
