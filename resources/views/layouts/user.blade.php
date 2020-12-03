<!doctype html>
<html lang="en">

    @include('layouts.partials.user.head')

<body>
    @include('layouts.partials.user.navbar')
    
    @yield('content')
    
    @include('layouts.partials.user.footer')
    
    @include('layouts.partials.user.scripts')
    
</body>

</html>