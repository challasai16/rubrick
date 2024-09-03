<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/Exception.php";
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";

$servername = "127.0.0.1";
$username = "u764112711_rubrickform";
$password = "/P39YXXE=a";
$database = "u764112711_rubrickform";


$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$submissionSuccess = false;
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $project = $conn->real_escape_string($_POST['project']);

    $sql_check = "SELECT * FROM `rubrick_leads` WHERE `Email` = '$email' OR `Number` = '$phone'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        $errorMessage = "Error: Email or phone number already exists. Please use a different email or phone number.";
    } else {
        $currentDateTime = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `rubrick_leads` (`Name`, `Email`, `Number`, `Projects`, `Date`) VALUES ('$name', '$email', '$phone', '$project', '$currentDateTime')";

        if ($conn->query($sql) === TRUE) {
             $apiUrl = "https://agility-fun-253.my.salesforce-sites.com/services/apexrest/leadservice";
            $data = array(
                "Name" => $name,
                "Source" => "Rubrick Website",
                "Email" => $email,
                "Phone" => $phone,
                "Project_Title" => $project,
                "sourceurl" => 'https://www.rubrick.in/',
                  "utm_source" => "google+",
                  "utm_medium" => "cpc",
                  "utm_campaign" => "gsn",
            );
            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array("Content-Type: application/json")
            );

            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                $errorMessage = "cURL error: " . curl_error($ch);
            }
            curl_close($ch);

            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'madworkdeveloper@gmail.com';
                $mail->Password = 'oklo toyb yeca iwex';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->isHTML(true);
                $mail->setFrom('enquiry@rubrick.in', 'Lead From Rubrick Website');
                $mail->addAddress('leads@madworks.in', 'Lead From Rubrick Website');
                $mail->addAddress('enquiry@rubrick.in', 'Lead From Rubrick Website');
                $mail->Subject = 'Lead From Rubrick Website';
                $mail->Body = "Name: $name <br> Mobile No: $phone <br> Email Id: $email <br> Project Title: $project";

                $mail->send();
                $submissionSuccess = true;
            } catch (Exception $e) {
                $errorMessage = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rubrick</title>
  <link rel="stylesheet" href="thankyou.css">
  <?php
  include "head.php";
  ?>

</head>

<body>
  <?php
  include "header.php";
  ?>
  <div class="container2">
    <div class="row">
      <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
        <div id="thankyou">
          <h2 id="h2thankyou">THANK YOU</h2>
        </div>
        <h2 class="text-center">We will get back to you as soon as possible..!</h2>

        <center>
          <div class="btn-group" style="margin-top:50px;">
            <a href="https://www.rubrick.in/" class="btn btn-lg btn-warning">BACK TO HOME</a>
          </div>
        </center>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>

</html>