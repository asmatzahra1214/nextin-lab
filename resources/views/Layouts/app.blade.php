<body style="margin:0; font-family: Arial, sans-serif;">

    {{-- Navbar --}}
    <div>@include('Components.Navbar')</div>

    <div style="display: flex;">

        {{-- Sidebar --}}
        <div style="width: 230px; background-color: #222; color: white; min-height: 100vh; position: fixed; top: 0; left: 0;">
            @yield('sidebar')
        </div>

        {{-- Content --}}
        <div style="margin-left: 230px; flex: 1; margin-top: 40px; padding: 20px;">
            @yield('content')
        </div>

    </div>

    {{-- Footer --}}
    @include('Components.Footer')

</body>
