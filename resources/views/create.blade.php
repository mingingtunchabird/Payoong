@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@section('content')

    <style>
        body{
            font-family: Mitr-Regular !important;
        }

        .wrapper {
            display: flex;
            width: 100%;
        }
        .box{
            position: fixed;
            height: 100vh;
            width: 500vh;
            margin-left: 10vw;
            background-color: white;
            margin-top: 20vh;
            border-radius: 10px;
        }

        #sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 2;
            background: #ffffff;
            border-color: #636b6f;
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
        input,option{
            font-family: Mitr;
            color: #9E9E9E;
        }



    </style>
    @csrf
    <style type="text/css">
        body { background: #F5F5F5 !important;}
        ,
        #inputcss{
            width: 55px;
            height: 430px;
        }


    </style>





    <div class="container box" >

    <div class="container">
        <div class="row">
{{--            <button class="btn btn-outline-danger mt-2"> <a href="home" style="color: black;"> < back </a> </button>--}}
            <div class="col-12 mt-3"> <p style="font-size: 30px;"> เพิ่มข้อมูลลูกบ้าน </p></div>
                <div class="text-center float-left"> <p style="font-size: 18px; color: #FF1313;"> *กรุณากรอกข้อมูลให้ครบทุกช่อง </p></div>

            <br><br>
            </div>
    </div>


<br>


    <form method="post" action="{{route('importuser')}}">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">ชื่อผู้เช่า</label>
                    <input type="text" name="firstname" class="form-control" id="exampleFormControlInput1"  placeholder="กรุณากรอกชื่อ">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">นามสกุลผู้เช่า</label>
                    <input type="text" name="lastname" class="form-control" id="exampleFormControlInput1" placeholder="กรุณากรอกนามสกุล">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">รหัสบัตรประจำตัวผู้เช่า</label>
                    <input type="text" name="iden_num" class="form-control" id="exampleFormControlInput1" placeholder="กรุณากรอกรหัสบัตรประชาชน">
                </div>

                <div class="form-group col-3">
                    <label for="exampleFormControlInput1">สัญชาติ</label>
                    <select class="form-control" name="nationality">
                        <option>Thai</option>
                        <option>Cambodian</option>
                        <option>Indonesian</option>
                        <option>Lao</option>
                        <option>Malaysian</option>
                        <option>Burmese</option>
                        <option>Filipino</option>
                        <option>Singaporean</option>
                        <option>Vietnamese</option>
                    </select>
                </div>

                <div class="form-group col-3">
                    <label for="exampleFormControlInput1">เลขห้อง</label>
                    <select class="form-control" name="roomid" >
                        @if(count($rooms)>0)
                        @foreach($rooms as $room)
                        <option>{{$room->roomid}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">เบอร์โทรศัพท์ผู้เช่า</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="กรุณากรอกเบอร์โทรศัพท์">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">อีเมลผู้เช่า</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="กรุณากรอกอีเมล">
                </div>
                <div class="form-group col-12 text-center mt-4">
                    <button type="submit" class="btn col-6" style="background: #2B4161; color: #f7f7f7;">เพิ่มข้อมูล</button>
                </div>
            </div>
        </div>
    </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
@endsection
