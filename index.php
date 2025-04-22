<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../seo-head.php");?>
    <title>Equity Feud</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="css/style-one.css?v=5" type="text/css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/sweetalert.min1.js"></script>
    <script src="js/jquery.min1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/style.css?v=3" type="text/css" rel="stylesheet">
</head>

<body class="bg">

    <?php
ob_start();
session_start();
error_reporting(0);
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('log_errors', 1);
include_once 'dao/config.php';
 $userLimit=1;
 include_once("../login-default.php");

?>

    <style>
    .begin {
        font-weight: bold;
        /*background-image: linear-gradient(to right, #E25569 , #FB9946);*/
        background-color: #2e3192;
        color: #ffffff;
        padding: 5px 15px 5px 15px;
        font-size: 15px;
        border-radius: 10px;
    }

    
    @media (min-width: 100px) and (max-width: 768px) {
        .bg {
            width: 100%;
            background-image: url("image/mob.png");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            height: 100vh;
        }}
    </style>


    <?php include("../actions-default.php");  back("https://extramileplay.com");?>
    <div class="container-fluid" style="margin-top:0px;">

        <div class="row">
            <div class="col-md-5 auto">
                <img src="image/logo.png" style="width:100%; margin-top:70px;" />
            </div>
            <div class="col-md-12 text-center" style="margin-top:15px;">
                <?php if(isset($loginSuccess)){
           echo '<a href="game.php"><div class="btn btn-info begin">BEGIN PLAY</div></a>';
    }?>

            </div>
        </div>
    </div>

    <script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     // Set GIF duration (in milliseconds)
    //     var gifDuration = 5000; // Adjust this to match your GIF length
    //     // Redirect after GIF ends
    //     setTimeout(function() {
    //         window.location.href = "game.php";
    //     }, gifDuration);

    // });
    // document.addEventListener('contextmenu', event => event.preventDefault());
    // document.onkeydown = function(e) {
    //     if (event.keyCode == 123) {
    //         return false;
    //     }
    //     if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
    //         return false;
    //     }
    //     if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
    //         return false;
    //     }
    //     if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
    //         return false;
    //     }
    // }
    </script>

</body>

</html>