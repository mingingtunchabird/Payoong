<?php

    $lineData['URL'] = "https://api.line.me/v2/bot/message/reply";
    $lineData['AccessToken'] = "sTkKc5lxIn4lRiXXOO70Yd3MBLft8VV3HbBGfY1ZN1Qtyzt0Sod0Yz4yWvJmXsNJ6m+T00no6Ru+5Dfe
    JeqFHg1LkFPqd7yg4RBCUFf7LYLQRwtTYWWk+wuhXuSeD0fF/nmePNZ/yJ4NpVdJVFn5ywdB04t89/1O/w1cDnyilFU=";


    $LINEData = file_get_contents('php://input');
    $jsonData = json_decode($LINEData,true);
    $replyToken = $jsonData["events"][0]["replyToken"];
    $userID = $jsonData["events"][0]["source"]["userId"];
    $text = $jsonData["events"][0]["message"]["text"];
    $timestamp = $jsonData["events"][0]["timestamp"];

    //connect to mysql
    $servername = "murmuring-peak-15503";
    $username = "b1fc6ec276658e";
    $password = "66d86aaa";
    $dbname = "heroku_32d195921bf0a64";
    $mysql = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($mysql, "utf8");

    if ($mysql->connect_error){
        $errorcode = $mysql->connect_error;
        print("MySQL(Connection)> ".$errorcode);
    }
    //connect to mysql


    // Function นี้เอาไว้ใช้สำหรับส่ง POST Request กลับไปที่ LINE โดยวิธีการใช้คือ
    // ตรง เรียก Function นี้โดยให้ค่า $replyJson เป็น JSON Data ที่จะส่งกลับไปที่ LINE
    // เเละ $sendInfo เป็น Array ที่มีค่า URL (ที่อยู่ที่จะส่งกลับไปที่ LINE [Reply,Push]) เเละ Accesstoken ใน Array นั้น
    function sendMessage($replyJson, $sendInfo){
        $ch = curl_init($sendInfo["URL"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $sendInfo["sTkKc5lxIn4lRiXXOO70Yd3MBLft8VV3HbBGfY1ZN1Qtyzt0Sod0Yz4yWvJmXsNJ6m+T00no6Ru+5DfeJeqFHg1LkFPqd7yg4RBCUFf7LYLQRwtTYWWk+wuhXuSeD0fF/nmePNZ/yJ4NpVdJVFn5ywdB04t89/1O/w1cDnyilFU="])
            );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $replyJson);

        $result = curl_exec($ch);
        curl_close($ch);
	return $result;
}

//เก็บ ข้อมูลใน Table LOG
$mysql->query("INSERT INTO `log`(`userID`, `text`, `timestamp`) VALUES ('$userID','$text','$timestamp')");
//เรียกดูข้มูลใน Table Customer
$getUser = $mysql->query("SELECT * FROM `customer` WHERE `userID`='$userID'");
$getuserNum = $getUser->num_rows;

//ตรวจว่า พบข้อมูลจากการ Query หรือไม่
if ($getuserNum == "0"){
    //ไม่พบ

    // ตรงนี้ป็นส่วนข้อความที่เราต้องการจะ Reply ครับ
    //ตรงนี้เป็น Type ซึ่งผมจะส่งเป็น Text
    $replyText["type"] = "text";
    //ตรงนี้เป็น Text ที่เราต้องการจะ Reply ครับ
    $replyText["text"] = "ติดยังนะ";

    // Note: ตรงส่วนนี้เราสามารถเเก้ไขให้เป็นข้อความประเภทอื่นๆได้เช่น
    // Flex Message, Image, Sticker ครับลองไปปรับใช้กันดูนะครับ

  } else {
    //พบ
    //นำข้อมูลมา Loop เพื่อเอาค่าออกมาใส่ตามตัวเเปรต่างๆ
    while($row = $getUser->fetch_assoc()){
      $Name = $row['Name'];
      $Surname = $row['Surname'];
      $CustomerID = $row['customerID'];
    }

    //อธิบายอยู่ด้านบนครับ
    $replyText["type"] = "text";
    $replyText["text"] = "สวัสดีคุณ $Name $Surname (#$customerID)";
  }

  $lineData['URL'] = "https://api.line.me/v2/bot/message/reply";
  $lineData['AccessToken'] = "sTkKc5lxIn4lRiXXOO70Yd3MBLft8VV3HbBGfY1ZN1Qtyzt0Sod0Yz4yWvJmXsNJ6m+T00no6Ru+5DfeJeqFHg1LkFPqd7yg4RBCUFf7LYLQRwtTYWWk+wuhXuSeD0fF/nmePNZ/yJ4NpVdJVFn5ywdB04t89/1O/w1cDnyilFU=";

//สร้างตัวเเปรเป็น Array ที่มี replyToken ก่อน
$replyJson["replyToken"] = $replyToken;
//จากนั้นนำข้อความที่เราทำไว้ด้านบนลงมาใส่ในตัวเเปรนี้อีกที
$replyJson["messages"][0] = $replyText;
//เเละทำมันเป็น JSON Data ซะ
$encodeJson = json_encode($replyJson);

//ทำการเรียก Function sendMessage ที่เราเขียนไว้ด้านบน
$results = sendMessage($encodeJson,$lineData);
//เอา สิ่งที่ Function นี้ Return กลับมาดูเผื่อมันมี Error โดยการ echo มันออกมาเลยครับ
echo $results;
//ปกติ LINE จะมอง Request ที่สมบูรณ์ จะต้องมีการส่ง Response Code เป็นเลข 200 กลับไปที่ LINE ด้วย ดังนั้น
//อย่าลืมส่งอันนี้ไปด้วยครับ
http_response_code(200);







?>
