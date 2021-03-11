<!--header start-->
        <!--判斷是否傳overlay變數-->
        <header class="l-header @isset($overlay) l-header_overlay @endisset"> 

            <div class="l-navbar l-navbar_expand  
                        @isset($overlay) l-navbar_t-dark-trans @else l-navbar_t-light @endisset 
                        js-navbar-sticky">  <!--判斷是否傳overlay變數，改變navbar顏色-->
                <div class="container-fluid">
                    <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

                        <!--logo start-->
                        <a href="index.html" class="logo-brand">
                            @isset($overlay)  <!--判斷是否傳overlay變數，改變logo顏色-->
                                <img class="retina" src="assets/img/logo-dark.png" alt="Massive">
                            @else
                                <img class="retina" src="assets/img/logo.png" alt="Massive">
                            @endisset
                            
                        </a>
                        <!--logo end-->

                        <!--mega menu start-->
                        <ul class="menuzord-menu menuzord-right c-nav_s-standard">
                            @php Illuminate\Support\Facades\Log::info(request()->path()); @endphp  <!--可以從storage/log裡的檔案看到目前網址的路徑-->
                            <li class="@if(request()->is('/')) active @endif">  <!--直接用request變數取得路徑網址，若目前網址為/則顯示active-->
                                <a href="/">Home</a>
                            </li>
                            <li class="@if(request()->is('about')) active @endif"> <!--直接用request變數取得路徑網址，若目前網址為about則顯示active-->
                                <a href="/about">About</a>
                            </li>
                            <li class="@if(request()->is('contact')) active @endif"> <!--直接用request變數取得路徑網址，若目前網址為contact則顯示active-->
                                <a href="/contact">Contact</a>
                            </li>
                        </ul>
                        <!--mega menu end-->

                    </nav>
                </div>
            </div>

        </header>
        <!--header end-->