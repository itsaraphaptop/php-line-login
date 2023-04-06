<?php
include('connect.php');
   if( $_POST["name"] || $_POST["email"] ) {
      if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
         die ("invalid name and name should be alpha");
      }
        $sqlquery = "insert into appointments (title, description, start, stime, end, etime, location, color, className) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['startbook']."', '".$_POST['timebook']."', '' , '', 'HQ','green','fc-event-success')";
 
        if ($conn->query($sqlquery) === TRUE) {
            echo "record inserted successfully";
            $message = 'แจ้งเตือนรายการสั่งซื้อ จาก'.$_POST['name']." ยอดเงิน 500 บาท";
            sendLineNotify($message);
        } else {
            echo "Error: " . $sqlquery . "<br>" . $conn->error;
        }
      echo "Welcome ". $_POST['name']. "<br />";
      echo "You are ". $_POST['email']. " years old.";
      echo "You are ". $_POST['startbook']. " years old.";
      echo "You are ". $_POST['timebook']. " years old.";
      
      exit();
   }

    function sendLineNotify($message)
    {
        $token = "aMwvyw0qEzjc8D2Zak2t5Y3wEvgjFWVc5RPt1mdSkl2"; // ใส่ Token ที่สร้างไว้

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "message=" . $message);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $token . '',);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);

        if (curl_error($ch)) {
            echo 'error:' . curl_error($ch);
        } else {
            $res = json_decode($result, true);
            echo "status : " . $res['status'];
            echo "message : " . $res['message'];
        }
        curl_close($ch);
    }
?>