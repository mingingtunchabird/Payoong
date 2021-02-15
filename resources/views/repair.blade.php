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

        #myBtn{
            background-color: #61D15B;
            border: none;
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

        .box{
            position: fixed;
            height: 100vh;
            width: 150vh;
            margin-left: 10vw;
            background-color: white;
            margin-top: 20vh;
            border-radius: 10px;
        }



    </style>





    <div class="container box" >

    <div class="container">
        <div class="row">
            <div class="col-12 mt-3"> <p style="font-size: 30px;"> รายการแจ้งซ่อม </p></div>

            <br><br>
        </div>
    </div>

   <div class="container">
       <div class="row justify-content-end">
           <button id="myBtn" class="btn mt-2 justify-content" style="">  เพิ่มรายการแจ้งซ่อม  </button>
           <br><br>
       </div>
   </div>




    <br>




    @if(count($repairs)>0)
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="font-weight: lighter;">วัน-เวลา เข้าซ่อม</th>
                <th scope="col" style="font-weight: lighter;">หัวข้อ</th>
                <th scope="col" style="font-weight: lighter;">ภาพประกอบ</th>
                <th scope="col" style="font-weight: lighter;"></th>


            </tr>
            </thead>
            <tbody>



            @foreach($repairs as $repair)
                <tr>
                    <td>{{$repair->day}} <br> {{$repair->time}}</td>
                    <td> {{$repair->type_repair}} </td>
                    <td>{{ $repair->img }}</td>
                    <td><button class="btn btn-success" type="submit">รายละเอียด</button>  </td>

                </tr>
            @endforeach
            @endif

            </tbody>
        </table>

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
                                <input type="text" name="type_repair" class="form-control" id="exampleFormControlInput1" placeholder="กรอกชื่อผู้รับ">
                            </div>



                            <div class="form-group col-6">

                                <label for="exampleFormControlInput1">วัน-เวลา</label>
                                <input type="text" name="day time" class="form-control" id="exampleFormControlInput1" placeholder="กรอกวัน - เวลา">
                            </div>


                            <div class="form-group col-12">
                                <label for="exampleFormControlInput1">แนบรูปภาพ</label>
                                <input type="text" name="img" class="form-control" id="exampleFormControlInput1" placeholder="กรอกหมายเลขติดตาม">
                            </div>





                            <div class="form-group col-12 text-center mt-4">
                                <button type="submit" class="btn col-6" style="background: #2B4161; color: #f7f7f7;">เพิ่มรายการแจ้งซ่อม</button>
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




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
@endsection
