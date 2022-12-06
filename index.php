<?php
session_start();
ob_start();

if (isset($_SESSION["username"]) == "") {
    header("location:login.php");
    ob_flush();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>