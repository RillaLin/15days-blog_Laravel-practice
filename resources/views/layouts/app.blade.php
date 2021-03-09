<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.head')   <!--include layout的php.blade檔-->
</head>

<body>
    @include('layouts.preloader')   <!--include layout的php.blade檔-->
    
    <div class="wrapper">
        @include('layouts.header',['overlay'=>(isset($overlay))?$overlay:null])   <!--include layout的php.blade檔，做判斷是否有收到index傳來的overlay變數-->
        
        @yield('hero') <!--hero section 網頁中的大圖-->
        @yield('page-title')
        
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
