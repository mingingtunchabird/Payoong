<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>BUSY AUNTIE</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/67dd3a2868.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="layouts/favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body>

<style>

    .wrapper {
        display: flex;
        width: 100%;
    }
    .active{
        background-color: #0b2e13;
    }


    #sidebar {
        font-family: Mitr-Regular;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        /* z-index: 2; */
        background: #ffffff;
        color: #2B4161;
        transition: all 0.3s;


    }
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
    }

    p,h3{
        font-family: Mitr;
        color: #1d2124;
    }
    a{
        text-decoration: none !important;
    }

    label{
        font-family: Mitr;
        color: #1d2124;
        font-size: 20px;
    }
    .box{
        height: 100vh;
        width: 900vh;
        margin-left: 10vw;
        background-color: white;
        margin-top: 10vh;
        border-radius: 10px;
    }



</style>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky" style="z-index: 4; height: 90px; position: fixed;">
        <a href="home">                <img   src="https://sv1.picz.in.th/images/2021/02/11/o1lNH9.png" width="185px" height="36px">
        </a>
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" >
            <br>
            <div class="sidebar-header">

            </div>

            <ul class="list-unstyled components" style="margin-left: 30px; ">
{{--                <p class="ml-lg-4">BUSY AUNTIE</p>--}}
                <br>
                <li >
                    <br>
                    <br>
                    <br>
                    <br>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-users mr-1"></i> ข้อมูลลูกบ้าน</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li class="ml-3" style="margin-top: 10px;">
                            <a href="import-form"> <i class="fas fa-file-upload mr-1"></i> อัพโหลดข้อมูล</a>
                        </li>
                        <li class="ml-3" style="margin-top: 10px;">
                            <a href="add-user"> <i class="fas fa-user-plus mr-1"></i> เพิ่มข้อมูล</a>
                        </li>
                    </ul>
                </li>
                <br>
                <li >
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-file-invoice-dollar mr-1"></i> รายการร้องเรียน </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu1">
                        <li class="ml-3" style="margin-top: 10px;">
                            <a href="repair"> <i class="fas fa-wrench mr-1"></i>แจ้งซ่อม </a>
                        </li>
                        <li class="ml-3" style="margin-top: 10px;">
                            <a href="complain"> <i class="fas fa-user mr-1"></i> เรื่องร้องเรียน </a>
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-bullhorn mr-1"></i> แจ้งลูกบ้าน</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu2">
                        <li class="ml-3" style="margin-top: 10px;">
                            <a href="package"> <i class="fas fa-box-open mr-1"></i> พัสดุ</a>
                        </li>
                        <li class="ml-3" style="margin-top: 10px;">
                            <a href="news"> <i class="fas fa-newspaper mr-1"></i> ข่าวสาร</a>
                        </li>
                        <li class="ml-3" style="margin-top: 10px;">
                            <a href="add-bill"> <i class="fas fa-file-invoice-dollar mr-1"></i> ใบแจ้งหนี้</a>
                        </li>
                    </ul>
                </li>


                <br>
                <li>
                    <a href="setting"  aria-expanded="false" > <i class="fas fa-user-cog"></i> ตั้งค่า </a>
                </li>

            </ul>

        </nav>

    </div>

    <main class="container">
        @include('inc.message')
        @yield('content')
    </main>
</div>
        @include('sweetalert::alert')

{{-- <script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script> --}}

<script
    src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="javascript">
    $(document).on('click','ul li', function (){
        $(this).addClass('active').siblings().removeClass('active')
    })
</script>

</body>
</html>


