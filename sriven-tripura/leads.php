<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "rubrik";

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
    <?php include ("includes/toplinks.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEADS</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet'>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-wrapper,
        .dashboard-wrapper {
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            box-sizing: border-box;
        }

        .login-container {
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            margin: auto;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-container button[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background-color: #895e41;
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

        .dashboard-wrapper {
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 30px;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .dashboard-header h1 {
            font-size: 2rem;
            color: #333;
        }

        .dashboard-header a {
            background-color: #895e41;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .dashboard-header a:hover {
            background-color: #d32f2f;
        }

        .filter {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter label {
            font-size: 16px;
            margin-right: 10px;
        }

        .filter input[type="date"] {
            font-size: 16px;
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .filter input[type="submit"] {
            background-color: #895e41;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .filter input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table thead {
            background-color: #895e41;
            color: white;
        }

        table thead tr {
            font-size: 1.2rem;
        }

        table td,
        table th {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        #btnExport {
            background-color: #895e41;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
            display: inline-block;
        }

        #btnExport:hover {
            background-color: #d32f2f;
        }

        .top-scroll {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            cursor: pointer;
        }

        .top-scroll i {
            font-size: 2.5rem;
            color: #895e41;
        }

        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .filter {
                flex-direction: column;
                align-items: flex-start;
            }

            .filter label,
            .filter input[type="date"],
            .filter input[type="submit"] {
                margin-bottom: 10px;
            }
        }
    </style>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <?php if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']): ?>
        <div class="login-wrapper">
            <div class="login-container">
                <h2>Login Form</h2>
                <form method="POST" action="">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
                <?php if (isset($error)): ?>
                    <p class="error-message"><?= $error ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="dashboard-wrapper">
            <div class="dashboard-header">
                <h1>Leads Dashboard</h1>
                <a href="leads.php?logout=true">Log out</a>
            </div>
            <form action="leads.php" class="filter" method="GET">
                <div>
                    <label for="startfilter">From:</label>
                    <input type="date" id="startfilter" name="startfilter">
                    <label for="endfilter">To:</label>
                    <input type="date" id="endfilter" name="endfilter">
                    <input type="submit" id="date-submit" value="Submit">
                </div>

            </form>

            <?php
            if (!empty($_GET['startfilter']) && !empty($_GET['endfilter'])) {
                $start_date = date('Y-m-d', strtotime($_GET['startfilter']));
                echo "Start Date: " . $start_date . "<br><br>";
                $end_date = date('Y-m-d', strtotime($_GET['endfilter']));
                echo "End Date: " . $end_date . "<br><br>";
            }
            ?>

            <table id="headerTable">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Interested In</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `leads`";
                    if (!empty($_GET['startfilter']) && !empty($_GET['endfilter'])) {
                        $start_date = date('Y-m-d', strtotime($_GET['startfilter']));
                        $end_date = date('Y-m-d', strtotime($_GET['endfilter']));
                        $sql = "SELECT * FROM `leads` WHERE Date BETWEEN '$start_date' AND '$end_date'";
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

        <div class="top-scroll">
            <i class="bi bi-arrow-up-circle-fill"></i>
        </div>

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
            topDScroll.addEventListener("click", function () {
                window.scrollTo(0, 0);
            });
        </script>
    <?php endif; ?>

</body>

</html>