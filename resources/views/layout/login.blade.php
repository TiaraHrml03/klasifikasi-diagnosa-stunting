<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.style')
</head>
<body>
    <div id="main-wrapper">
        <div class="content-body">
            @yield('content')
        </div>
    </div>

    @include('include.footer')

    @include('include.script')

    @stack('addon-script')

    @stack('js')
    
</body>
</html>