<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>DORM</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<style>

    .wrapper {
        display: flex;
        width: 100%;
    }

    #sidebar {
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        z-index: 999;
        background: #333333;
        color: #fff;
        transition: all 0.3s;
    }

</style>

<body>

{{--    <div class="wrapper">--}}
{{--        <!-- Sidebar -->--}}
{{--        <nav id="sidebar">--}}
{{--            <br>--}}
{{--            <div class="sidebar-header">--}}
{{--                <a href="home">                <img  style="margin-left: 37px;" src="https://www.img.in.th/images/ff15769aa7623dffbadd19f4a38f42da.png" width="150" height="150">--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <ul class="list-unstyled components" style="margin-left: 30px;">--}}
{{--                <p class="ml-lg-4">BUSY AUNTIE</p>--}}
{{--                <br>--}}
{{--                <li class="active">--}}
{{--                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-users mr-1"></i> ข้อมูลลูกบ้าน</a>--}}
{{--                    <ul class="collapse list-unstyled" id="homeSubmenu">--}}
{{--                        <li class="ml-3" style="margin-top: 10px;">--}}
{{--                            <a href="import-form"> <i class="fas fa-file-upload mr-1"></i> อัพโหลดข้อมูล</a>--}}
{{--                        </li>--}}
{{--                        <li class="ml-3" style="margin-top: 10px;">--}}
{{--                            <a href="add-user"> <i class="fas fa-user-plus mr-1"></i> เพิ่มข้อมูล</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <br>--}}
{{--                <li class="active">--}}
{{--                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-file-invoice-dollar mr-1"></i> รายการร้องเรียน </a>--}}
{{--                    <ul class="collapse list-unstyled" id="homeSubmenu1">--}}
{{--                        <li class="ml-3" style="margin-top: 10px;">--}}
{{--                            <a href="import-form"> <i class="fas fa-wrench mr-1"></i>แจ้งซ่อม </a>--}}
{{--                        </li>--}}
{{--                        <li class="ml-3" style="margin-top: 10px;">--}}
{{--                            <a href="add-user"> <i class="fas fa-user mr-1"></i> เรื่องร้องเรียน </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <br>--}}
{{--                <li class="active">--}}
{{--                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-bullhorn mr-1"></i> แจ้งลูกบ้าน</a>--}}
{{--                    <ul class="collapse list-unstyled" id="homeSubmenu2">--}}
{{--                        <li class="ml-3" style="margin-top: 10px;">--}}
{{--                            <a href="import-form"> <i class="fas fa-box-open mr-1"></i> พัสดุ</a>--}}
{{--                        </li>--}}
{{--                        <li class="ml-3" style="margin-top: 10px;">--}}
{{--                            <a href="news"> <i class="fas fa-newspaper mr-1"></i> ข่าวสาร</a>--}}
{{--                        </li>--}}
{{--                        <li class="ml-3" style="margin-top: 10px;">--}}
{{--                            <a href="add-bill"> <i class="fas fa-file-invoice-dollar mr-1"></i> ใบแจ้งหนี้</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <br>--}}
{{--                <li>--}}
{{--                    <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" > <i class="fas fa-ticket-alt mr-1"></i> คูปอง </a>--}}
{{--                </li>--}}

{{--            </ul>--}}

{{--        </nav>--}}

{{--    </div>--}}


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>
