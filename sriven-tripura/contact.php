<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/Exception.php";
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";

$mail = new PHPMailer(true);

// Database connection details
$servername = "127.0.0.1";
$username = "u764112711_rubrickform";
$password = "/P39YXXE=a";
$database = "u764112711_rubrickform";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $interested = $conn->real_escape_string($_POST['interested']);
    $message = $conn->real_escape_string($_POST['message']);
    
    
    $full_url = $_SERVER['HTTP_REFERER'];

    
    $url_components = parse_url($full_url);

   
    $utm_source = $utm_medium = $utm_campaign = $sourceurl = null;
    if (isset($url_components['query'])) {
        parse_str($url_components['query'], $params);
        $utm_source = isset($params['utm_source']) ? $conn->real_escape_string($params['utm_source']) : null;
        $utm_medium = isset($params['utm_medium']) ? $conn->real_escape_string($params['utm_medium']) : null;
        $utm_campaign = isset($params['utm_campaign']) ? $conn->real_escape_string($params['utm_campaign']) : null;
    }

    
    // echo "UTM Source: " . ($utm_source ? $utm_source : "N/A") . "<br>";
    // echo "UTM Medium: " . ($utm_medium ? $utm_medium : "N/A") . "<br>";
    // echo "UTM Campaign: " . ($utm_campaign ? $utm_campaign : "N/A") . "<br>";
    // echo "Source URL: " . ($full_url ? $full_url : "N/A") . "<br>";

 
    $sql_check = "SELECT * FROM `sriven-tripura` WHERE `Email` = '$email' OR `Number` = '$phone'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email or phone number already exists. Please use a different email or phone number.');</script>";
        echo "<script>window.history.back();</script>";
    } else {
        $currentDateTime = date("Y-m-d H:i:s");

       
        $sql = "INSERT INTO `sriven-tripura` (`Name`, `Email`, `Number`, `Interested`, `Message`, `Date`, `utm_source`, `utm_medium`, `utm_campaign`, `sourceurl`) 
                VALUES ('$name', '$email', '$phone', '$interested', '$message', '$currentDateTime', 
                " . ($utm_source ? "'$utm_source'" : "NULL") . ",
                " . ($utm_medium ? "'$utm_medium'" : "NULL") . ",
                " . ($utm_campaign ? "'$utm_campaign'" : "NULL") . ",
                " . ($full_url ? "'$full_url'" : "NULL") . ")";

        if ($conn->query($sql) === TRUE) {
          
            $api_url = "https://agility-fun-253.my.salesforce-sites.com/services/apexrest/leadservice";
            $data = array(
                "Name" => $name,
                "Source" => "Tripura Website",
                "Email" => $email,
                "Phone" => $phone,
                "Interested-In" => $interested,
                "sourceUrl" => $full_url,
                "utm_source" => $utm_source,
                "utm_medium" => $utm_medium,
                "utm_campaign" => $utm_campaign,
                "Message" => $message
            );

            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                echo "cURL error: " . curl_error($ch);
            } else {
                $response_data = json_decode($response, true);
                if (isset($response_data['id'])) {
                    echo "Lead created successfully in Salesforce. Lead ID: " . $response_data['id'];
                } else {
                    // echo "Error creating lead in Salesforce: " . $response;
                }
            }
            curl_close($ch);

          
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'madworkdeveloper@gmail.com';
                $mail->Password = 'oklo toyb yeca iwex';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->isHTML(true);
                 $mail->setFrom('enquiry@rubrick.in', 'Lead From Tripura Website');
                $mail->addAddress('leads@madworks.in', 'Lead From Tripura Website');
                $mail->addAddress('enquiry@rubrick.in', 'Lead From Tripura Website');

                $mail->Subject = 'Lead From Tripura Website';
                $mail->Body = "Name: $name <br> Mobile No: $phone <br> Email Id: $email <br> Interested In: $interested  <br> Message: $message <br> UTM Source: " . ($utm_source ? $utm_source : "N/A") . " <br> UTM Medium: " . ($utm_medium ? $utm_medium : "N/A") . " <br> UTM Campaign: " . ($utm_campaign ? $utm_campaign : "N/A") . " <br> Source URL: " . ($full_url ? $full_url : "N/A");

                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            echo "<script>window.location.href = 'thank-you.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
