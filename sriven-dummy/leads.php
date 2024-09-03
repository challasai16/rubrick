<?php
session_start();



// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    if ($inputUsername == "Rubrik" && $inputPassword == "rubrik@123") {
        $_SESSION['loggedin'] = true;
        header("Location: leads.php");
        exit();
    } else {
        $error = "Please check once Username or Password are not matched";
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: leads.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/toplinks.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>LEADS</title>
    <style>
        .addCategory {
            padding: 4rem;
            padding-top: 15vh;
        }
        table {
            border: 1px solid black;
            border-collapse: collapse;
            margin-top: 50px;
            width: 100%;
            text-align: center;
            padding: 4px;
        }
        thead {
            background-color: var(--orange-color);
            color: white;
            padding: 1rem;
        }
        thead tr {
            font-size: 1.2rem;
        }
        #startfilter, #endfilter {
            font-size: 1rem;
            padding: 0.2rem;
        }
        table td {
            border: 1px solid black;
            padding: 4px;
        }
        tbody tr td {
            font-size: 0.98rem;
            padding: 0.3rem 1rem;
        }
        a {
            padding: 10px;
            text-decoration: none;
            color: black;
            gap: 10px;
        }
        a:hover, .active {
            color: Orange;
            font-weight: bolder;
        }
        .filter {
            margin: 50px 0;
        }
        #date-submit {
            background-color: var(--orange-color);
            color: white;
            font-size: 1rem;
            padding: 0.4rem 1rem;
            border: 0;
            margin-left: 2rem;
        }
        #btnExport {
            background-color: var(--orange-color);
            color: white;
            font-size: 1rem;
            padding: 0.4rem 1.5rem;
            border: 0;
            margin: 3rem 0;
        }
        .lead-access-manu {
            z-index: -1 !important;
            display: none !important;
        }
        #kenytChatBubble {
            display: none !important;
        }
        .sidebar-cta {
            display: none !important;
        }
        .top-scroll {
            position: fixed;
            bottom: 2rem;
            right: 1rem;
            z-index: 1000;
            cursor: pointer;
        }
        .top-scroll i {
            font-size: 2.5rem;
            color: var(--orange-color);
        }
        .error-access {
            color: red;
            margin-top: 1rem;
        }
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-wrapper {
            text-align: center;
        }

        .login-container {
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 30px;
            width: 300px;
            text-align: center;
            margin: auto; /* Center horizontally */
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
        }

        .login-container button[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .login-container button[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        @media (max-width: 400px) {
            .login-container {
                width: 90%;
            }
        }

        .button {
            background-color: var(--orange-color); 
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #ff8c00; 
        }

        /* Additional styles for specific button */
        #date-submit {
            margin-left: 2rem; /* Example margin for this specific button */
        }
    </style>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <?php if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) : ?>
        
    <section class="lead-access" id="popup">
    <div class="login-container">
        <h2>Login Form</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)): ?>
            <p class="error-message"><?= $error ?></p>
        <?php endif; ?>
    </div>
    </section>
    <?php else : ?>
    <div class="addCategory">
        <form action="leads.php" class="filter" method="GET">
            <label for="filter">From: &nbsp;</label>
            <input type="date" id="startfilter" name="startfilter">
            <label for="filter"> &nbsp; To: &nbsp;</label>
            <input type="date" id="endfilter" name="endfilter">
            <input type="submit" class="button" id="date-submit" value="Submit">
            <a href="leads.php?logout=true" class="logout">Log out</a>
        </form>

        <?php 
            if (!empty($_GET['startfilter']) && !empty($_GET['endfilter'])) {
                $start_date = date('Y-m-d', strtotime($_GET['startfilter']));
                echo "Start Date:  " . $start_date . "</br></br>";
                $end_date = date('Y-m-d', strtotime($_GET['endfilter']));
                echo "End Date:  " . $end_date . "</br></br>";
            }
        ?>
        <div class="top-scroll">
            <i class="bi bi-arrow-up-circle-fill"></i>
        </div>
       
        <table id="headerTable">
            <h1>Leads DashBoard</h1>
            <thead>
                <tr>
                    <td style="color:black">S.No</td>
                    <td style="color:black">Name</td>
                    <td style="color:black">Email</td>
                    <td style="color:black">Mobile Number</td>
                    <td style="color:black">InterestedIn</td>
                    <td style="color:black">Message</td>
                    <td style="color:black">Date</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `leads`";
                if (!empty($_GET['startfilter']) && !empty($_GET['endfilter'])) {
                    $start_date = date('Y-m-d', strtotime($_GET['startfilter']));
                    $end_date = date('Y-m-d', strtotime($_GET['endfilter']));
                    $sql = "SELECT * FROM `leads` WHERE Date BETWEEN '$start_date' and '$end_date'";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['Name'] ?></td>
                            <td><?= $row['Email'] ?></td>
                            <td><?= $row['Number'] ?></td>
                            <td><?= $row['Interested'] ?></td>
                            <td><?= $row['Message'] ?></td>
                            <td><?= $row['Date'] ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='7'>NO RECORDS FOUND</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <iframe id="txtArea1" style="display:none"></iframe>
        <button id="btnExport" onclick="fnExcelReport();">DOWNLOAD LEADS</button>
    </div>
    <?php endif; ?>

    <!--footer starts here -->
    
    <!--footer ends here -->

    <script>
        function fnExcelReport() {
            var tab_text = "<table border='none'><tr bgcolor='#87AFC6'>";
            var j = 0;
            var tab = document.getElementById('headerTable');

            for (j = 0; j < tab.rows.length; j++) {
                tab_text += tab.rows[j].innerHTML + "</tr>";
            }

            tab_text += "</table>";
            tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");
            tab_text = tab_text.replace(/<img[^>]*>/gi, "");
            tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, "");

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                txtArea1.document.open("txt/html", "replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
            } else {
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
            }

            return (sa);
        }

        let topDScroll = document.querySelector(".top-scroll");
        topDScroll.addEventListener("click", function() {
            window.scrollTo(0, 0);
        });
    </script>
</body>
</html>
