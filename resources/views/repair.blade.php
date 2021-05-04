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

        /* #myBtn{
            background-color: #61D15B;
            border: none;
            color: white;
        } */

        #sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 2;
            background: #ffffff;
            /*border: 0.5px solid;*/
            /*border-radius: 2px;*/
            /*border-color: #636b6f;*/
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

        span.active-menu a{
            background-color: white;
            color: black;
        }
        input,option,label{
            font-family: Mitr;
            color: #9E9E9E;
        }
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 10; /* Sit on top */
            left: 0;
            top: 0;

            width: 100%; /* Full width */
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

        img {
            max-width: 100%;
            max-height: 100%;
            }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .box{
            /* margin: auto; */
            /* width: 60%; */
            height: fit-content;
            width: 100%;
            /* margin-left: 10vw; */
            background-color: white;
            /* margin-top: 20vh; */
            border-radius: 10px;
            transform: translate( 0%, 5%);
        }




    </style>




<div class="container ">


</div>
    <div class="box" >

    {{-- <div class="container"> --}}
        <div class="d-flex">
            <div class="p-2"> <p style="font-size: 30px;"> รายการแจ้งซ่อม </p></div>

            <div class="ml-auto p-2">
                <button id="myBtn" class="btn btn-outline-success" style="margin-top:15px;">  เพิ่มรายการแจ้งซ่อม  </button>
            </div>
        </div>


    {{-- </div> --}}
    <form action="/repair" method="GET">
        {{-- <div class="container">
            <div class="row">
                <div class="col-12 mt-3">
                    <a href="/repair" style="font-size: 20px;">รายการทั้งหมด |</a></span>
                </div>
            </div>
        </div> --}}
        <div class="d-flex">
            <div class="p-2"> <p style="font-size: 18px; color:gray;"> เลือกรายการที่จะแสดง </p></div>
        </div>

        <div class="d-flex">


            <div class="p-2">
                <span>
                    <a class="active-menu" href="/repair" style="font-size: 20px; padding-top:10px; color: black;">รายการทั้งหมด </a>|
                    <a href="{{route('processRepair')}}" style="font-size: 20px; padding-top:10px; color: grey;">กำลังดำเนินการ </a>|
                    <a href="{{route('doneRepair')}}" style="font-size: 20px; padding-top:10px; color: grey;">ดำเนินการแล้ว </a> |
                </span>

            </div>

    <div class="p-2">
            <select class="form-control selectpicker" name="type_repair">
                <option value="" disabled selected>เลือกรายการ</option>
                <option>ซ่อมไฟฟ้า</option>
                <option>ซ่อมน้ำประปา</option>
                <option>ซ่อมแอร์</option>
                <option>ซ่อมประตู</option>
                <option>ซ่อมทีวี</option>
            </select>
    </div>
        <div class="p-2">
            <button type="submit" class="btn btn-outline-secondary p-2" style="border-radius: 50%;">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
    </div>

    @if(count($repairs)>0)
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="font-weight: lighter; text-align: center;">ห้อง</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">เวลาที่แจ้ง</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">วันที่เข้าซ่อม</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">ช่วงเวลาที่เข้าซ่อม</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">หัวข้อ</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">สถานะ</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">action</th>

                <th scope="col" style="font-weight: lighter;"></th>



            </tr>
            </thead>
            <tbody>



            @foreach($repairs as $repair)
                <tr>
                    <td style="font-weight: lighter; text-align: center;">{{$repair->roomid}}</td>
                    <td style="font-weight: lighter; text-align: center;">{{$repair->created_at}}</td>
                    <td style="font-weight: lighter; text-align: center;">{{$repair->day}}</td>
                    <td style="font-weight: lighter; text-align: center;">{{$repair->time}}</td>
                    <td style="font-weight: lighter; text-align: center;"> {{$repair->type_repair}} </td>

                    @if($repair->status == "ยังไม่ได้ซ่อม")
                    <td style="font-weight: lighter; text-align: center;" class="text-danger">{{ $repair->status }}</td>
                    @endif
                    @if ($repair->status == "ซ่อมแล้ว")
                    <td style="font-weight: lighter; text-align: center;" class="text-success">{{ $repair->status }}</td>
                    @endif
                    @if ($repair->status == "กำลังดำเนินการ")
                    <td style="font-weight: lighter; text-align: center;" class="text-warning">{{ $repair->status }}</td>
                    @endif



                    @if ($repair->status == "ซ่อมแล้ว")
                    <td style="text-align: center;">

                        <button id="myBtn2" class="btn btn-success"  type="submit">แจ้งเตือน</button>

                    </td>
                    @endif


                    @if ($repair->status == "กำลังดำเนินการ")
                    <td style="text-align: center;">

                        <a href="{{route('acceptRepair2', $repair->id)}}" id="myBtn2" class="btn btn-success">ดำเนินการแล้ว</a>
                    </td>
                    @endif


                    @if ($repair->status == "ยังไม่ได้ซ่อม")
                    <td style="text-align: center;">

                        <a href="{{route('acceptRepair', $repair->id)}}" id="myBtn2" class="btn btn-success">รับเรื่องซ่อม</a>
                    </td>
                    @endif

                    @if($repair->status == "ซ่อมแล้ว")

                    @endif

                </tr>
            @endforeach
            @endif

            </tbody>
        </table>

    </div>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="post" action="{{route('addRepair')}}">
                @csrf
                <div class="container">
                    <div class="row">

                        <div class="col-12"><p style="font-size: 18px;">เพิ่มรายการแจ้งซ่อม</p></div>

                        <div class="form-group col-6">

                            <label for="exampleFormControlInput1">หัวข้อแจ้งซ่อม</label>
                            <input type="text" name="roomid" class="form-control" id="exampleFormControlInput1" placeholder="หมายเลขห้อง">
                        </div>



                        <div class="form-group col-6">

                            <label for="exampleFormControlInput1">หัวข้อแจ้งซ่อม</label>
                            <select class="form-control" name="type_repair">
                                <option>ซ่อมไฟฟ้า</option>
                                <option>ซ่อมน้ำประปา</option>
                                <option>ซ่อมแอร์</option>
                                <option>ซ่อมประตู</option>
                                <option>ซ่อมทีวี</option>
                            </select>
                        </div>



                        <div class="form-group col-6">

                            <label for="exampleFormControlInput1">วัน</label>
                            <select class="form-control" name="day">
                                <option>จันทร์</option>
                                <option>อังคาร</option>
                                <option>พุธ</option>
                                <option>พฤหัส</option>
                                <option>ศุกร์</option>
                            </select>
                        </div>

                        <div class="form-group col-6">

                            <label for="exampleFormControlInput1">เวลา</label>
                            <select class="form-control" name="time">
                                <option>10.00 - 12.00 น.</option>
                                <option>13.00 - 16.00 น.</option>
                            </select>
                        </div>


                        {{-- <div class="form-group col-12">
                            <label for="exampleFormControlInput1">สถานะ</label>
                            <select class="form-control" name="status">


                                    <option>ซ่อมแล้ว</option>
                                    <option>ยังไม่ได้ซ่อม</option>
                                    <option>กำลังดำเนินการ</option>



                        </select>
                        </div> --}}

                        <div class="form-group col-12 text-center mt-4">
                            <button type="submit" class="btn col-6" style="background: #2B4161; color: #f7f7f7;">เพิ่มรายการแจ้งซ่อม</button>
                        </div>
                    </div>
                </div>
            </form>
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
        for (var i=1; i <= {{count($repairs)}}; i++){
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
