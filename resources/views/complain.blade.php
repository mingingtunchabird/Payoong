@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@section('content')

    @csrf
    <style type="text/css">
        body { background: #F5F5F5 !important;
                font-family: Mitr-Regular !important;
        }

        .box{
            /* position: fixed; */
            height: 100%;
            width: 70vw;
            /* margin-left: 10vw; */
            /* transform: translate(35px,100px); */
            background-color: white;
            margin-top: 20vh;
            border-radius: 10px;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 100; /* Sit on top */
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
            transform: translate(0,0);
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

<div class="container box">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 mt-3"> <p style="font-size: 30px;"> รายการร้องเรียน </p></div>
            <button id="myBtn" class="btn btn-danger mt-2 justify-content" style="float: left; margin-right: 10px ">  เพิ่มรายการร้องเรียน  </button>

            <br><br>
        </div>
    </div>

    <div class="container">
        <div class="row">


            <div class="col"><h4>ห้อง 112 </h4></div>



          <div class="w-100"></div>
          <div class="col">ไอซ์ พาริส หล่อมาก</div>

        </div>
      </div>

      <hr>

      <div class="container">
        <div class="row">


            <div class="col"><h4>ห้อง 325 </h4></div>



          <div class="w-100"></div>
          <div class="col">ห้องข้าง ๆ เเลี้ยงแมวเสียงดังมากเลย</div>

        </div>
      </div>

      <hr>

      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="post" action="{{route('addComplain')}}">
                @csrf
                <div class="container">
                    <div class="row">





                        <div class="form-group col-6">

                            <label for="exampleFormControlInput1">ห้อง</label>
                            <select class="form-control" name="title">

                                    @foreach($renters as $renter)
                                        <option>{{$renter->roomid}}</option>
                                    @endforeach

                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">รายละเอียด</label>
                            <input type="text" name="detail" class="form-control" id="exampleFormControlInput1" placeholder="กรอกรายละเอียดเรื่องร้องเรียน">
                        </div>





                        <div class="form-group col-12 text-center mt-4">
                            <button type="submit" class="btn col-6" style="background: #2B4161; color: #f7f7f7;">เพิ่มรายการร้องเรียน</button>
                        </div>


                    </div>
                </div>
            </form>
        </div>

    </div>


</div> {{--  //div yai --}}


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
