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
        .box{
            /* position: fixed; */
            height: 80%;
            width: 70vw;
            /* margin-left: 10vw; */
            transform: translate(35px,100px);
            background-color: white;
            /* margin-top: 20vh; */
            border-radius: 10px;
        }



    </style>





    <div class="container box" >
    <div class="container">
        <div class="row">
{{--            <button class="btn btn-outline-danger mt-2"> <a href="home" style="color: black;"> < back </a> </button>--}}
            <div class="col-12 mt-3"> <p style="font-size: 30px;"> ตั้งค่า ค่าเช่าห้อง หน่วยค่าน้ำ,ค่าไฟ </p></div>

{{--            <div class="text-center float-left"> <p style="font-size: 18px; color: #FF1313;"> *กรุณากรอกข้อมูลให้ครบทุกช่อง </p></div>--}}
{{--            @if(count($settings)>0)--}}

{{--                 <div class="col-4 mt-3">--}}
{{--                        ค่าห้องที่เพิ่มไว้ :  @foreach($settings as $setting) <p style="font-size: 20px; font-weight: normal;">{{$setting->rent_price}} บาท @endforeach</p>--}}
{{--                    </div>--}}
{{--                    <div class="col-4 mt-3">--}}
{{--                        เรทค่าไฟที่เพิ่มไว้ : @foreach($settings as $setting) <p style="font-size: 20px; font-weight: normal">{{$setting->elec_rate}} บาทต่อหน่วย @endforeach</p>--}}
{{--                    </div>--}}
{{--                    <div class="col-4 mt-3">--}}
{{--                        เรทค่าน้ำที่เพิ่มไว้ : @foreach($settings as $setting) <p style="font-size: 20px; font-weight: normal">{{$setting->pumb_rate}} บาทต่อหน่วย @endforeach </p>--}}
{{--                    </div>--}}

{{--            @endif--}}

            <br><br>
        </div>
    </div>



    <br>


    <form method="post" action="{{route('addsetting')}}">
        @csrf
        <div class="container">
            <div class="row justify-content-center">



                <div class="form-group col-3">
                    <label for="exampleFormControlInput1">ค่าเช่าห้อง : บาท</label>
                    <input type="text" name="rent_price" class="form-control" id="exampleFormControlInput1" placeholder="{{$settings->rent_price}}">
                </div>

                <div class="form-group col-3">
                    <label for="exampleFormControlInput1">หน่วยค่าไฟ : บาท</label>
                    <input type="text" name="elec_rate" class="form-control" id="exampleFormControlInput1" placeholder="{{$settings->elec_rate}}">
                </div>


                <div class="form-group col-3">
                    <label for="exampleFormControlInput1">หน่วยค่าน้ำ : บาท</label>
                    <input type="text" name="pumb_rate" class="form-control" id="exampleFormControlInput1" placeholder="{{$settings->pumb_rate}}">
                </div>

                <div class="form-group col-12 text-center mt-4">
                    <button type="submit" class="btn col-6" style="background: #2B4161; color: #f7f7f7;">บันทึก</button>
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
