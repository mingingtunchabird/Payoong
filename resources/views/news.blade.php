@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@section('content')
    @csrf
    <style type="text/css">
        body { background: #F5F5F5 !important;
                font-family: Mitr-Regular !important;
        }


    </style>

    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <style>

        .wrapper {
            display: flex;
            width: 100%;
        }
        .box{
            position: fixed;
            height: 100vh;
            width: 80vw;
            margin-left: 10vw;
            background-color: white;
            margin-top: 20vh;
            border-radius: 10px;
        }

        p,a,h3{
            font-family: Mitr;
            color: #1d2124;
        }
        a{
            text-decoration: none !important;
        }
        input,option,label{
            font-family: Mitr;
            color: #9E9E9E;
        }
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            /*position: fixed; !* Stay in place *!*/
            z-index: 2; /* Sit on top */
            left: 0;
            top: 0;
            /*margin-left: 200px;*/
            width: 1500px; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            z-index: 20;
            border: 1px solid #888;
            width: fit-content; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }



    </style>



    {{--    <form method="get" action="{{ route('search') }}" >--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="input-group col align-self-end">--}}
    {{--                    <input type="text" class="form-control  text-center"  placeholder="Search ..." name="search" >--}}
    {{--                    <button class="btn btn-primary" type="submit">Search</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </form>--}}

    <div class="box" >

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="" style="height: 150px;">
                    <p class="m-3" style="font-size: 30px;">รายการข่าวสาร</p>
                    <div class="col-4 m-2" style="width: 900vh;"><button id="myBtn" class="btn" style="font-family: Mitr;
                    color: white; background-color: #61D15B; border-radius: 10px; font-weight: lighter; ">
                            เพิ่มรายการข่าวสาร
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="post" action="{{route('addnews')}}">
                @csrf
                <div class="container" style="width: fit-content; height: fit-content;">
                    <div class="row justify-content-center">
                        <div class="col-12"><p style="font-size: 18px;">เพิ่มรายการข่าวสาร</p></div>

                        <div class="col-12"><p style="font-size: 18px;">หัวข้อ</p></div>
                        <div class="form-group col-12">
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="...">
                        </div>

                        <div class="col-12"><p style="font-size: 18px;">รายละเอียด</p></div>
                        <div class="form-group col-12">
                            <input type="text" name="detail" class="form-control" style="height: 200px;" id="exampleFormControlInput1" placeholder="...">
                        </div>

                        <div class="form-group col-12 text-center mt-4">
                            <button type="submit" class="btn col-6" style="background: #2B4161; color: #f7f7f7;">เพิ่มข่าวสาร</button>
                        </div>


                    </div>
                </div>
            </form>
        </div>

    </div>



    @if(count($news)>0)

        <div class="container" id="data-user">
            <div class="row">
                @foreach($news as $new)
                    <div class="col-4">
                        <div class="card" style="width: 20rem; margin-top: 30px;">
                            <div class="card-body" style="border: none;">
                                <p class="card-text" style="font-weight: normal;">{{$new->title}}</p>
                                <p class="card-text" style="font-weight: lighter;">{{$new->detail}}</p>
                                <button type="submit" class="btn col-6" style="background: #02C701; color: #f7f7f7; font-family: Mitr; border-radius: 10px;">ส่งแจ้งเตือน</button>
                                <button type="submit" class="btn col-3 ml-4" style="background: #FF6666; color: #f7f7f7; font-family: Mitr; border-radius: 10px;">ลบ</button>
                            </div>
                        </div>
                    </div>

                @endforeach
                @endif
            </div>
        </div>
    </div>


    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

@endsection
