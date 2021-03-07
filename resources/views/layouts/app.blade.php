<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.head')   <!--include layout的php.blade檔-->
</head>

<body>
    @include('layouts.preloader')   <!--include layout的php.blade檔-->
    
    <div class="wrapper">
        @include('layouts.header')   <!--include layout的php.blade檔-->
        
        @yield('hero') <!--hero section 網頁中的大圖-->
        
        <!--body content start 這裡是每頁會一直變換的內容-->
        <section class="body-content">
            @yield('content')
        </section>
        <!--body content end-->

        @include('layouts.footer')   <!--include layout的php.blade檔-->
    </div>

    @include('layouts.js')   <!--include layout的php.blade檔-->
    
</body>

</html>
