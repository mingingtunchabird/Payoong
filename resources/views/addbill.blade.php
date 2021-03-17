@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@section('content')

    @csrf
    <style type="text/css">
        body { background: #F5F5F5 !important;
            font-family: Mitr !important;
        }


    </style>

    <style>

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
        input{
            font-family: Mitr;
            color: #c3c3c3;
        }
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            z-index: 3; /* Sit on top */
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
            z-index: 4;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 50%; /* Could be more or less, depending on screen size */
            z-index: 10;
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
        <div class="row">
{{--            <button class="btn btn-outline-danger mt-2"> <a href="home" style="color: black;"> < back </a> </button>--}}
            <div class="col-12 mt-3"> <p style="font-size: 30px;"> ใบแจ้งหนี้ </p></div>
            <br><br>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-end">
            <button id="myBtn" class="btn mt-2 justify-content" style="background-color: #61D15B;
            color: white; font-family: Mitr; border-radius: 10px;">
                เพิ่มใบแจ้งหนี้
            </button>
            <br><br>
        </div>
    </div>


    <br>

{{--    @if(count($todos)>0)--}}

{{--        <div class="container" id="data-user">--}}
{{--            <div class="row">--}}
{{--                @foreach($todos as $todo)--}}
{{--                    <div class="col-4" >--}}
{{--                        <div class="card" style="width: 20rem; margin-top: 30px;">--}}
{{--                            <div class="card-body">--}}
{{--                                <p class="card-text" style="font-weight: lighter;"> ห้อง <i class="fas fa-door-open"></i> : {{$todo->roomid}}</p>--}}
{{--                                <p class="card-text" style="font-weight: lighter;"> หน่วยที่ใช้ไฟ  : {{$todo->elec_price}} หน่วย</p>--}}
{{--                                <p class="card-text" style="font-weight: lighter;"> หน่วยที่ใช้น้ำ  : {{$todo->pumb_price}} หน่วย</p>--}}
{{--                                <p class="card-text" style="font-weight: lighter;"> ค่าเช่าห้อง  : {{$todo->rent_price}} บาท</p>--}}
{{--                                <p class="card-text" style="font-weight: lighter;"> ยอดรวม <i class="fas fa-money-bill"></i>  : {{$todo->total}} บาท</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}




        @if(count($todos)>0)
        <table class="table">
            <thead class="thead-dark" style="font-family: Mitr-Regular;">
            <tr>
                <th scope="col" style="font-weight: lighter; text-align: center;">ห้อง</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">หน่วยที่ใช้น้ำ</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">หน่วยที่ใช้ไฟ</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">ค่าเช่าห้อง</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">ยอดรวม</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">สถานะ</th>
                <th scope="col" style="font-weight: lighter; text-align: center;">action</th>

            </tr>
            </thead>
            <tbody>



            @foreach($todos as $todo)
            <tr style="font-family: Mitr-Regular; font-weight: lighter;">
                <td style="text-align: center;">{{$todo->roomid}}</td>
                <td style="text-align: center;"> {{$todo->elec_price}} หน่วย </td>
                <td style="text-align: center;"> {{$todo->pumb_price}} หน่วย </td>
                <td style="text-align: center;"> {{$todo->rent_price}} บาท </td>
                <td style="text-align: center;">{{$todo->total}} บาท </td>
                <td style="text-align: center;">{{$todo->status}}</td>
                <td style="text-align: center;">
                    <button id="myBtn2" class="btn btn-success" onclick="reply('{{$todo->roomid}}','{{$todo->pumb_price}}','{{$todo->elec_price}}','{{$todo->rent_price}}','{{$todo->total}}')" type="submit">ส่งบิล</button>
                </td>
            </tr>
            @endforeach
            @endif

            </tbody>
        </table>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="post" action="{{route('importbill')}}">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-12"><p style="font-size: 18px;">ลูกบ้าน</p></div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1">เลขห้อง</label>
                            <select class="form-control" name="roomid">
                                @if(count($rooms)>0)
                                    @foreach($rooms as $room)
                                        <option>{{$room->roomid}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-12"><p style="font-size: 18px;">รายละเอียดบิล</p></div>


                        <div class="form-group col-5">
                            <label for="exampleFormControlInput1">จำนวนหน่วยค่าน้ำที่ใช้ไป</label>
                            <input type="text" name="pumb_price" class="form-control" id="exampleFormControlInput1" placeholder="กรอกจำนวนหน่วยค่าน้ำ">
                        </div>

                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1">ราคาต่อหน่วยค่าน้ำ</label>
                            <select class="form-control" name="pumb_rate">
                                @if(count($settings)>0)
                                    @foreach($settings as $setting)
                                        <option>{{$setting->pumb_rate}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-5">
                            <label for="exampleFormControlInput1">จำนวนหน่วยค่าไฟที่ใช้ไป</label>
                            <input type="text" name="elec_price" class="form-control" id="exampleFormControlInput1" placeholder="กรอกจำนวนหน่วยค่าไฟ">
                        </div>

                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1">ราคาต่อหน่วยค่าไฟ</label>
                            <select class="form-control" name="elec_rate">
                                @if(count($settings)>0)
                                    @foreach($settings as $setting)
                                        <option>{{$setting->elec_rate}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1">ค่าเช่าห้อง</label>
                            <select class="form-control" name="rent_price">
                                @if(count($settings)>0)
                                    @foreach($settings as $setting)
                                        <option>{{$setting->rent_price}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>


                        <div class="form-group col-5">
                            <label for="exampleFormControlInput1">สถานะ</label>
                            <select class="form-control" name="status">
                                @if(count($rooms)>0)
                                    @foreach($rooms as $room)
                                        <option>จ่ายแล้ว</option>
                                        <option></option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

{{--                        <div class="form-group col-12/">--}}
{{--                            <label for="exampleFormControlInput1">ค่าบำรุงหอพัก</label>--}}
{{--                            <select class="form-control" name="rent_price">--}}
{{--                                <option>5000</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

                        <div class="form-group col-12 text-center mt-4">
                            <button type="submit" class="btn col-6" style="background: #2B4161; color: #f7f7f7;">สร้างบิล</button>
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


        function reply(roomid, pumb_price, elec_price, rent_price, total, flex){
            $.post("https://www.busyaunties.lnw.mn/index.php/service/genQR", {
                total: total
            },
                function (data, textStatus, jqXHR) {
                    var qr = data.qr
                    console.log(qr);
                    $.post("https://www.busyaunties.lnw.mn/index.php/service/reply2", {
            roomid: roomid,
            pumb_price: pumb_price,
            elec_price: elec_price,
            rent_price: rent_price,
            total: total,
            flex: {
  "type": "bubble",
  "body": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "text",
        "text": "ใบแจ้งหนี้",
        "weight": "bold",
        "color": "#1DB446",
        "size": "sm"
      },
      {
        "type": "text",
        "text": "บิลเดือนนี้มาแล้ว!",
        "weight": "bold",
        "size": "xxl",
        "margin": "md"
      },
      {
        "type": "separator",
        "margin": "xxl"
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "xxl",
        "spacing": "sm",
        "contents": [
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "หน่วยค่าน้ำที่ใช้",
                "size": "sm",
                "color": "#555555"
              },
              {
                "type": "text",
                "text": pumb_price+" หน่วย",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "หน่วยค่าไฟที่ใช้",
                "size": "sm",
                "color": "#555555"
              },
              {
                "type": "text",
                "text": elec_price+" หน่วย",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "ค่าเช่าห้อง",
                "size": "sm",
                "color": "#555555"
              },
              {
                "type": "text",
                "text": rent_price+" บาท",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          },
          {
            "type": "separator",
            "margin": "xxl"
          },
          {
            "type": "box",
            "layout": "horizontal",
            "margin": "xxl",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "ยอดรวม",
                "size": "sm",
                "color": "#000000",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": total+" บาท",
                "size": "xxl",
                "color": "#1DB446",
                "align": "end"
              }
            ]
          },
          {
            "type": "separator",
            "margin": "xxl"
          },
          {
            "type": "box",
            "layout": "horizontal",
            "margin": "xxl",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "เลขที่บัญชี",
                "size": "xs",
                "color": "#aaaaaa"
              },
              {
                "type": "text",
                "text": "0911871629",
                "color": "#000000",
                "size": "xs",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "หมายเลขพร้อมเพย์",
                "size": "xs",
                "color": "#aaaaaa"
              },
              {
                "type": "text",
                "text": "093-159-4441",
                "color": "#000000",
                "size": "xs",
                "align": "end"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "image",
                "url": qr,
                "align": "center",
                "size": "xxl"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "margin": "xs",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "กรุณา Capture ภาพ QR Code",
                "size": "sm",
                "color": "#aaaaaa",
                "align": "center"
              }
            ]
          },
          {
            "type": "box",
            "layout": "horizontal",
            "margin": "xs",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "เพื่อทำรายการผ่าน mobile banking",
                "size": "sm",
                "color": "#aaaaaa",
                "align": "center"
              }
            ]
          }
        ]
      }
    ]
  }
}
        },
            function (data, textStatus, jqXHR) {
                console.log(data)
                if(data == '1'){
                    swal("แจ้งเตือนเรียบร้อย", "ส่งแจ้งเตือนให้ลูกบ้านเรียบร้อยแล้ว", "success")
                }else{
                    swal("Error!", "ส่งแจ้งเตือนไม่สำเร็จ ไม่ได้ลงทะเบียนหรือเปล่านะ!", "error")
                }
            },
        );
                }
            );


    }
    </script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
@endsection
