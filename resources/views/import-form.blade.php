@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@section('content')

    @csrf
    <style type="text/css">
        body { background:  #F5F5F5 !important;
                font-family: Mitr-Regular !important;

        }
        .box{
        /* position: fixed; */
        height: fit-content;
        width: 70vw;
        /* margin-left: 10vw; */
        transform: translate(150px,100px);
        background-color: white;
        /* margin-top: 20vh; */
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




    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <div class="container box" >
    <div class="container ml-3">
{{--        <button class="btn btn-outline-danger"> <a href="home" style="color: black;"> < back </a> </button>--}}
        <br><br>
        <div class="row">

            <div class="col-12">
                    <p style="font-size: 28px;">อัปโหลดข้อมูลลูกบ้านรายเก่า</p>
            </div>
            <div class="col-12">
                <p style="font-size: 30px; text-align: center;">ตัวอย่างข้อมูลที่ต้องใช้</p>
            </div>
            <div class="col-12">
                <p style="font-size: 18px; text-align: center; color: #FF1313;">***โปรดตั้งหัวข้อตามคอลัมน์ที่กำหนดไว้</p>
            </div>
            <div class="col-12">
                <img style="margin-top: 10px;" src="https://www.img.in.th/images/bf38d6ada330799ec75ed4746c68b84c.png" width="960" height="160">
            </div>
        </div>
    </div>

    <div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
    <form class="md-form" method="POST" action="{{route('import')}}" enctype="multipart/form-data">
        @csrf
        <div class="custom-file">
            <label for="file" style="">เลือกไฟล์</label>
            <input type="file" name="file" class="form-control"/>
        </div>
        <br><br>

        <div>
            <input type="submit" style="background: #2B4161; color: #f7f7f7; margin-top: 20px; " class="btn btn-primary col-md-12" value="อัปโหลดไฟล์"/>
        </div>

    </form>
        </div>
    </div>
    </div>

    </div>{{--div ใหญ่--}}

{{--<div class="container" style="padding-top:90px;">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6 offset-md-3">--}}
{{--            <form method="POST" action="{{route('import')}}" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                    <label for="file">Choose file</label>--}}
{{--                    <input type="file" name="file" class="form-control"/>--}}
{{--                </div>--}}
{{--                <input type="submit" class="btn btn-primary col-md-12" value="Submit"/>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
@endsection
