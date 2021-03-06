@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@section('content')

    @csrf
    <style type="text/css">
        body { background: #F5F5F5 !important;
                font-family: Mitr-Regular !important;
        }


    </style>

    <style>

        .wrapper {
            display: flex;
            width: 100%;
        }

        .box{
            /* position: fixed; */
            height: fit-content;
            width: 75vw;
            margin-left: 10vw;
            background-color: white;
            margin-top: 20vh;
            border-radius: 10px;
            /* display: flex; */
        }

        .btnSearch{
            background-color: #2B4161;
            color: white;
        }

        #sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 2;
            background: #ffffff;
            color: #fff;
            transition: all 0.3s;
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
            position: fixed; /* Stay in place */
            z-index: 50; /* Sit on top */
            left: 0;
            top: 0;
            /*margin-left: 200px;*/
            width: 100%x; /* Full width */
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
            border: 1px solid #888;
            width: 50%; /* Could be more or less, depending on screen size */
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







{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <button class="btn btn-outline-danger mt-2"> <a href="home" style="color: black;"> < back </a> </button>--}}
{{--            <div class="col-12 mt-3"> <p style="font-size: 30px;">  </p></div>--}}
{{--            <br><br>--}}
{{--        </div>--}}
{{--    </div>--}}




    <div class="container box" >
    <div class="container">
        <div class="d-flex">
            <div class="p-2"> <p style="font-size: 30px;"> ????????????????????????????????? </p></div>

            {{-- <div class="ml-auto p-2">
                <button id="myBtn" class="btn btn-danger" style="margin-right: 10px "> ?????????????????????????????? </button>
            </div> --}}
        </div>

            <div class="d-flex">
                <div class="p-2"> <p style="font-size: 18px; color:gray;"> ???????????????????????????????????????????????????????????? </p></div>
            </div>
            <div class="d-flex">

                <div class="p-2">
                    <span>
                        <a class="active-menu" href="/package" style="font-size: 20px; padding-top:10px; color: grey;">??????????????????????????????????????? </a>|
                        <a href="{{route('packageRecieved')}}" style="font-size: 20px; padding-top:10px; color: grey;">????????????????????? </a>|
                        <a href="{{route('notRecieved')}}" style="font-size: 20px; padding-top:10px; color: black;">?????????????????????</a> |
                    </span>

                </div>

                {{-- <form method="get" action="'/search'">
                <div class="p-2">
                    <div class="form-outline">
                        <input type="search" id="form1" class="form-control" placeholder="??????????????????????????????" aria-label="Search" />
                    </div>
                </div>
                <div class="p-2">
                        <button class="btn btnSearch" > <i class="fas fa-search" style="font-size: 1.5em"></i> </button>
                </div>
                </form> --}}




            </div>






    </div>


    <br>




    @if(count($packages)>0)
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="font-weight: lighter; text-align: center;">?????????-???????????? ????????????????????????</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">????????????</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">??????????????????????????????</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">????????????????????????????????????????????????????????????</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">???????????????????????????????????????</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">???????????????</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">action</th>
                {{-- <th scope="col" style="font-weight: lighter">???????????????????????????</th> --}}

            </tr>
            </thead>
            <tbody>



            @foreach($packages as $package)
                <tr>
                    <td style="font-weight: lighter; text-align: center;">{{$package->created_at}}</td>
                    <td style="font-weight: lighter; text-align: center;"> {{$package->roomid}} </td>
                    <td style="font-weight: lighter; text-align: center;"> {{$package->pac_name}} </td>
                    <td style="font-weight: lighter; text-align: center;">{{ $package->emp_name }}</td>
                    <td style="font-weight: lighter; text-align: center;">  {{$package->trackid}}  </td>
                    @if($package->status == "???????????????????????????")
                    <td style="font-weight: lighter; text-align: center;" class="text-danger">{{ $package->status }}</td>
                    @endif
                    @if ($package->status == "?????????????????????")
                    <td style="font-weight: lighter; text-align: center;" class="text-success">{{ $package->status }}</td>
                    @endif
                    {{-- <td>  {{$package->img}}  </td> --}}

                        @if ($package->status == "???????????????????????????")

                        <td style="text-align: center;">

                            <a href="{{route('acceptPackage', $package->id)}}" id="myBtn2" class="btn btn-outline-success">?????????????????????</a>
                        </td>

                        {{-- <td style="text-align: center;">
                            <div class="d-flex">
                                <div class="p-2">
                                    <input type="text" class="form-control bg-white" id="textcopy{{$package->id}}" value="????????????????????????????????? {{$package->pac_name.'????????????' . $package->roomid}}???????????????????????????" readonly>
                                </div>

                                <div class="p-2">
                                    <div class="input-group-append">
                                        <button id="copyBtn{{$package->id}}" class="btn btn-outline-warning" onclick="copy(this)" type="button" value="{{$package->id}}">
                                            <i class="far fa-copy"></i>
                                        </button>
                                    </div>
                                </div>



                            </div>

                        </td> --}}


                    @endif

                    @if($package->status == "?????????????????????")
                    <td style="text-align: center;">
                        <a  href="{{ route('destroy', $package->id) }}" class="del btn btn-danger" onclick="return confirm('??????????????????????????????????');">??????</a>
                    </td>
                    @endif




                </tr>
            @endforeach
            @endif

            </tbody>
        </table>


    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="post" action="{{route('addpackage')}}">
                @csrf
                <div class="container">
                    <div class="row">

                        <div class="col-12"><p style="font-size: 18px;">????????????????????????????????????????????????</p></div>

                        <div class="form-group col-6">

                            <label for="exampleFormControlInput1">?????????????????????????????? (?????????????????????)</label>
                            <input type="text" name="pac_name" class="form-control" id="exampleFormControlInput1" placeholder="??????????????????????????????????????????">
                        </div>



                        <div class="form-group col-6">

                            <label for="exampleFormControlInput1">????????????????????????????????????????????????????????????????????????</label>
                            <input type="text" name="emp_name" class="form-control" id="exampleFormControlInput1" placeholder="?????????????????????????????????????????????????????????">
                        </div>


                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1">???????????????????????????????????????</label>
                            <input type="text" name="trackid" class="form-control" id="exampleFormControlInput1" placeholder="???????????????????????????????????????????????????">
                        </div>


                        {{-- <div class="form-group col-4">
                            <label for="exampleFormControlInput1">?????????????????????</label>
                            <select class="form-control" name="roomid">
                                @if(count($rooms)>0)
                                    @foreach($rooms as $room)
                                        <option>{{$room->roomid}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div> --}}

                        {{--                        <div class="form-group col-12/">--}}
                        {{--                            <label for="exampleFormControlInput1">???????????????????????????????????????</label>--}}
                        {{--                            <select class="form-control" name="rent_price">--}}
                        {{--                                <option>5000</option>--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}

                        <div class="form-group col-12 text-center mt-4">
                            <button type="submit" class="btn col-6" style="background: #2B4161; color: #f7f7f7;">??????????????????????????????</button>
                        </div>


                    </div>
                </div>
            </form>
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

<script>
    function copy(clickedBtn){
        var id = clickedBtn.value;
        var copyText = document.querySelector('#textcopy'+id);
        copyText.select();
        document.execCommand('copy');
        for (var i=1; i <= {{count($packages)}}; i++){
            if (i == id){
                $("#copyBtn"+i).html("copied!");
            }
            else{
                $("#copyBtn"+i).html("copy");
            }
        }
        //alert("Copied! " + copyText.value);
    }
</script>





        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
@endsection
