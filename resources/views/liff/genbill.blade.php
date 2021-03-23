
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;400&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
    <script src="https://static.line-scdn.net/liff/edge/versions/2.7.1/sdk.js"></script>
    <script src="liff-starter.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD RECEIPT</title>
</head>
<body>

<style>

    body{
        font-family: Mitr !important;
        background: #FFFFFF !important;
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


</style>

<img id="pictureUrl" width="25%">
  <p id="userId"></p>
  <p id="displayName"></p>
  {{-- <p id="statusMessage"></p> --}}




<div class="container-fluid">
  <div class="row">
  <div class="col-xs-6 col-md-4  mt-4 text-center mr-2"><img src="https://sv1.picz.in.th/images/2021/02/11/o1lNH9.png" width="200" height="42"></div>
  <div class="col-xs-6 col-md-4"><h1 class="mt-5 title" style="margin-top:80px; text-align: center;">อัปโหลดภาพสลิปโอนเงิน</h1></div>

  <form action="{{ route('storebill') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="col-xs-6 col-md-4 mt-5 text-center d-inline-flex ml-1">
        <div class="custom-file rounded-50">
            <input type="file" class="custom-file-input" id="customFile" name="image">
            <label class="custom-file-label rounded-50" for="customFile">Choose image</label>
            <input type="text" id="userId" value="" name="userID">
        </div>
      </div>

      <div class="col-xs-6 col-md-4 mt-5 text-center d-inline-flex ml-1 p-1" style="margin-top:200px;">
                <button style="width:100%; height:50px; border-radius:70px;" onclick="pop()" class="btn btn-primary" type="submit" > <p style="font-size:1.2rem; margin-top:3px;">UPLOAD</p></button>
        </div>


      </div>
    </form>



</div>

<script>

function pop() {
                // console.log(data)
                swal("Upload success!");

            }
</script>

<script>
    function runApp() {
      liff.getProfile().then(profile => {
        document.getElementById("pictureUrl").src = profile.pictureUrl;
        document.getElementById("userId").innerHTML = '<b>UserId:</b> ' + profile.userId;
        document.getElementById("displayName").innerHTML = '<b>DisplayName:</b> ' + profile.displayName;
        document.getElementById("statusMessage").innerHTML = '<b>StatusMessage:</b> ' + profile.statusMessage;
        document.getElementById('userId').value = profile.userId;

      }).catch(err => console.error(err));
    }
    liff.init({ liffId: "1655771343-VgwjeoZR" }, () => {
      if (liff.isLoggedIn()) {
        runApp()
      } else {
        liff.login();
      }
    }, err => console.error(err.code, error.message));
  </script>





</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


