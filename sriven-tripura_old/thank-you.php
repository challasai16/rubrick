<?php

use PHPMailer\PHPMailer\PHPMailer;
require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection parameters 
$servername = "127.0.0.1";
$username = "u764112711_rubrickform";
$password = "/P39YXXE=a";
$database = "u764112711_rubrickform";


$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phonenumber = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $interested = htmlspecialchars($_POST['interested']);
    $message = htmlspecialchars($_POST['message']);
    $currentDateTime = date("Y-m-d H:i:s");

    try {
        // PHPMailer configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'madworkdeveloper@gmail.com';
        $mail->Password = 'oklo toyb yeca iwex';
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('enquiry@rubrick.in', 'Lead From Rubrick Website');
        $mail->addAddress('leads@madworks.in', 'Lead From Rubrick Website');
        $mail->addAddress('enquiry@rubrick.in', 'Lead From Rubrick Website');
        $mail->addReplyTo($email, 'Lead From Rubrick Website');
        $mail->isHTML(true);
        $mail->Subject = "Lead From Rubrick Website";
        $mail->Body = "Name: $name <br> Mobile No: $phonenumber <br> Email Id: $email <br> InterestedIn: $interested <br> Message: $message";
        $mail->send();
    } catch (Exception $e) {
        echo "Email sending failed: " . $mail->ErrorInfo;
    }

    // Insert lead data into the database
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `leads`(`Name`, `Email`, `Number`, `Interested`, `Message`, `Date`) VALUES ('$name','$email','$phonenumber','$interested','$message','$currentDateTime')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Lead data successfully inserted into the database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en-IN">
<head>
    <link rel="shortcut icon" href="assets/images/logo/favicon-64.png" type="images/x-icon" />
    <?php include("includes/toplinks.php");?>
    <title>Thank You</title>
    <meta property="og:title" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:url" content="" />
    <meta property="og:description" content="" />
    <meta property="og:locale" content="" />
    <meta property="og:type" content="" />
    <meta property="og:image" content="" />
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <link rel="canonical" href="">
    <!-- Google tag (gtag.js) --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16616948923"></script>
    <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-16616948923'); </script>
    <!-- Event snippet for Thank you conversion page -->
    <script> gtag('event', 'conversion', { 'send_to': 'AW-16616948923/_ZkOCNmQxMMZELuJyvM9', 'value': 1.0, 'currency': 'INR' }); </script>
    
</head>
<body class="bg-9">
   <?php include("includes/header.php"); ?>
    <section class="banner_sec"></section>
    <section class="wcu-area wcu-area-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="text-center" style="padding:5rem 0;">
                        <div class="section-heading section-heading-3">
                            <h2 class="section-title"><i class="checkmark">✓</i></h2>
                            <h1>Thank you for contacting us... !!!</h1>
                            <p>We will get back to you soon.</p>
                            <div class="content">
                                <div class='links'>
                                    <a href="https://www.rubrick.in/sriven-tripura/" class="hm_bk">Back to Home <i class="fal fa-house"></i></a>
                                    <a href="Tripura_Brochure.pdf" download="Tripura_Brochure.pdf" class="hm_bk ml-2">Download Brochure <i class="fal fa-download"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <?php include("includes/footer.php"); ?>
     <?php include("includes/bottom-links.php"); ?>
</body>
</html>
