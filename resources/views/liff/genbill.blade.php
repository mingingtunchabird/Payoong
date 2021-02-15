
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BILL</title>
</head>
<body>

<style>

    body{
        margin:0;
        padding:0;
    }
    p,h1,h2,h3{
        font-family: Mitr;
    }
    a{
        text-decoration: none !important;
    }

    label{
        font-family: Mitr;
        color: #1d2124;
        font-size: 20px;
    }
    .title{
        color: #709EF9;
        font-family: Mitr;
        font-size : 2rem;
    }
    body {
        background: #FFFFFF !important;

        }

</style>



<div class="container-fluid">
  <div class="row">
  <div class="col-xs-6 col-md-4  mt-4 text-center mr-2"><img src="https://www.img.in.th/images/fe5cb20f8cde72b965b445a44c5887b4.png" width="200" height="50"></div>
  <div class="col-xs-6 col-md-4"><h1 class="mt-5 title" style="margin-top:80px;">บิลค่าหอพัก</h1></div>

  <div class="col-xs-6 col-md-4 mt-3">
        <h1 style="font-size:1rem; color: #709EF9;">เจ้าหน้าที่หอพัก สดใสชัยชนะ</h1>
        <h1 style="font-size:1rem">ที่อยู่</h1>
  </div>

  <div class="col-xs-6 col-md-4 mt-3">
        <h1 style="font-size:1rem;">ชื่อลูกค้า / Name : </h1>
        <h1 style="font-size:1rem;">ใบแจ้งหนี้ / INVOICE :</h1>
        <h1 style="font-size:1rem;">วันที่ / DATE : </h1>
  </div>

  <div class="col-xs-6 col-md-4 mt-4  text-center d-inline-flex">
    <h1  style="font-size:1rem; margin-right:19px; color: #709EF9;">รายการ </h1>
    <h1  style="font-size:1rem; margin-right:19px; color: #709EF9;">ราคา/หน่วย</h1>
    <h1  style="font-size:1rem; margin-right:19px; color: #709EF9;">หน่วยที่ใช้ไป</h1>
    <h1  style="font-size:1rem; margin-right:19px; color: #709EF9;">ยอดรวม</h1>
  </div>
  @foreach($genbills as $genbill)
  <div class="col-xs-6 col-md-4 mt-3  text-center d-inline-flex">
    <h1  style="font-size:1rem; margin-right:50px; ">ค่าน้ำประปา </h1>
    <h1  style="font-size:1rem; margin-right:80px; ">{{ $genbill -> pumb_rate }}</h1>
    <h1  style="font-size:1rem; margin-right:50px; ">{{ $genbill -> pumb_price }}</h1>
    <h1  style="font-size:1rem;  ">{{ $genbill -> pumb_rate * $genbill -> pumb_price}}</h1>
  </div>

  <div class="col-xs-6 col-md-4 mt-3  text-center d-inline-flex">
    <h1  style="font-size:1rem; margin-right:70px; ">ค่าไฟฟ้า </h1>
    <h1  style="font-size:1rem; margin-right:70px; ">{{ $genbill -> elec_rate }}</h1>
    <h1  style="font-size:1rem; margin-right:40px; ">{{ $genbill -> elec_price }}</h1>
    <h1  style="font-size:1rem;  ">{{ $genbill -> elec_rate * $genbill -> elec_price}}</h1>
  </div>

  <div class="col-xs-6 col-md-4 mt-3  text-center d-inline-flex">
    <h1  style="font-size:1rem; margin-right:45px; "> ค่าหอพัก </h1>
    <h1  style="font-size:1rem; margin-right:80px; ">{{ $genbill -> rent_price }}</h1>
    <h1  style="font-size:1rem; margin-right:50px; "> - </h1>
    <h1  style="font-size:1rem;  ">{{ $genbill -> rent_price }}</h1>
  </div>

  <div class="col-xs-6 col-md-4 mt-5 text-center d-inline-flex ml-1">
    <h1  style="font-size:1.4rem; margin-right:45px; color: #709EF9; "> ยอดรวม </h1>
    <h1  style="font-size:1rem; margin-right:80px; "></h1>
    <h1  style="font-size:1rem; margin-right:50px; "></h1>
    <h1  style="font-size:1.4rem; color: #709EF9; ">{{ $genbill -> total }}</h1>
  </div>

  <div class="col-xs-6 col-md-4 mt-5 text-center d-inline-flex ml-1 p-1" style="margin-top:200px;">
            <button style="width:100%; height:50px; border-radius:70px;" class="btn btn-primary" type="submit" > <p style="font-size:1.2rem; margin-top:3px;">ดาวน์โหลดใบแจ้งหนี้</p></button>
    </div>

  @endforeach
  </div>
</div>








    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                    <h1 class="mt-8 title" style="margin-top:80px;">บิลค่าหอพัก</h1>
            </div>
            <div class="col-12 mt-5">
                    <h1 style="font-size:4rem; color: #709EF9;">เจ้าหน้าที่หอพัก สดใสชัยชนะ</h1>
                    <h1 style="font-size:4rem">ที่อยู่</h1>
            </div>

            <div class="col-12 mt-5">
                    <h1 style="font-size:4rem;">ชื่อลูกค้า / Name : </h1>
                    <h1 style="font-size:4rem;">ใบแจ้งหนี้ / INVOICE :</h1>
                    <h1 style="font-size:4rem;">วันที่ / DATE : </h1>
            </div>

            <div class="col-12  d-flex text-center ml-0" style="margin-top:150px;">
                    <h1  style="font-size:4rem; margin-right:80px; color: #709EF9;">รายการ </h1>
                    <h1  style="font-size:4rem; margin-right:80px; color: #709EF9;">ราคา/หน่วย</h1>
                    <h1  style="font-size:4rem; margin-right:80px; color: #709EF9;">หน่วยที่ใช้ไป</h1>
                    <h1  style="font-size:4rem; margin-right:80px; color: #709EF9;">ยอดรวม</h1>
            </div>
            @foreach($genbills as $genbill)

            <div class="col-12  d-flex text-center" style="margin-top:80px;">
                    <h1  style="font-size:4rem; margin-right:250px;">ค่าน้ำประปา </h1>
                    <h1  style="font-size:4rem; margin-right:300px;"> {{ $genbill -> pumb_rate }}</h1>
                    <h1  style="font-size:4rem; margin-right:200px;"> {{ $genbill -> pumb_price }}</h1>
                    <h1  style="font-size:4rem;">{{ $genbill -> pumb_rate * $genbill -> pumb_price}}</h1>
            </div>

            <div class="col-12  d-flex text-center" style="margin-top:80px;">
                    <h1  style="font-size:4rem; margin-right:300px;">ค่าไฟฟ้า </h1>
                    <h1  style="font-size:4rem; margin-right:280px;"> {{ $genbill -> elec_rate }}</h1>
                    <h1  style="font-size:4rem; margin-right:150px;"> {{ $genbill -> elec_price }}</h1>
                    <h1  style="font-size:4rem;">{{ $genbill -> elec_rate * $genbill -> elec_price}}</h1>
            </div>

            <div class="col-12  d-flex text-center" style="margin-top:80px;">
                    <h1  style="font-size:4rem; margin-right:210px;">ค่าหอพัก </h1>
                    <h1  style="font-size:4rem; margin-right:290px;"> {{ $genbill -> rent_price }}</h1>
                    <h1  style="font-size:4rem; margin-right:200px;"> - </h1>
                    <h1  style="font-size:4rem;">{{ $genbill -> rent_price }}</h1>
            </div>


            <div class="col-12  d-flex text-center" style="margin-top:150px;">
                    <h1  style="font-size:5rem; margin-right:230px; color: #709EF9;">ยอดรวม </h1>
                    <h1  style="font-size:5rem; margin-right:290px;"></h1>
                    <h1  style="font-size:5rem; margin-right:260px;"></h1>
                    <h1  style="font-size:5rem; color: #709EF9;">{{ $genbill -> total }}</h1>
            </div>
            @endforeach

        <div class="col-12" style="margin-top:200px;">
            <button style="width:1300px; height:200px; border-radius:70px;" class="btn btn-primary" type="submit" > <p style="font-size:60px;">ดาวน์โหลดใบแจ้งหนี้</p></button>
        </div>

        </div>
    </div> -->




</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


