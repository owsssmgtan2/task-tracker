<!DOCTYPE html>
<html lang="en">

    @include ('layouts.head')

    <body class="fix-header">
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>

        @if(Auth::check())
            <div id="wrapper">
                @include ('layouts.header')

                @include ('layouts.nav')
                <div id="page-wrapper">
                    <div class="container-fluid">
                        
                        @include ('layouts.content-header')

                        @yield ('main-content')
                    </div>
                    @include ('layouts.footer')
                </div>
            </div>
        @else
            <div id="wrapper">
                @yield ('login-content')
                @include ('layouts.footer')
            </div>
        @endif

        @include ('layouts.foot')

    </body>


</html>