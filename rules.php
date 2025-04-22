<?php
ob_start();
error_reporting(0);
session_start();
if($_SESSION['token'] == ""){
   header('location:index.php');
}

include_once 'dao/config.php';
$userId = $_SESSION['userId'];
$organizationId = $_SESSION['organizationId'];
$sessionId = $_SESSION['sessionId'];



include 'dao/config.php';


?>

<!DOCTYPE html>
<html>

<head>
    <title>Mother's day Feud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min1.js"></script>
    <script src="js/bootstrap.min1.js"></script>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="js/sweetalert.min1.js"></script>

    <style>
    .row {
        margin-right: 0px !important;
        margin-left: 0px !important;
    }

    @font-face {
        font-family: 'FiraSans-Medium';
        src: url('fonts/FiraSans-Medium.otf');
    }


    body {
        font-family: 'FiraSans-Medium';
        margin: 0px;
        padding: 0px;
    }

    .submit-btn {
        color: white;
        padding: 6px 16px 6px;
        text-transform: uppercase;
        border-radius: 5px;
        font-weight: bold;

    }

    #subbtn {
        color: white;
        padding: 6px 30px 6px;
        text-transform: uppercase;
        border-radius: 5px;
        font-weight: bold;
        background-color: #2e3192;

    }

    @media screen and (min-width: 768px) {
        .bg {
            background-image: url("image/desk.png");
            background-size: 100% 100%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            position: relative;
        }



    }

    @media screen and (max-width: 768px) {
        .bg {
            background-image: url("image/mob.png");
            background-attachment: fixed;
            background-repeat: no-repeat;
            height: 100%;
            width: 100%;
            /* position: relative; */
        }

        .contentdata {
            margin-top: 100px !important;
        }

    }

    .logout-btn {
        width: 70%;
    }

    .rule-list li {
        list-style-type: none;
        background-image: url(image/arrow.png);
        background-repeat: no-repeat;
        text-align: left;
        width: 100%;
        padding-bottom: 10px;
        font-size: 20px;
        font-weight: 500;
        color:black;
        padding-left: 40px;
    }

    .auto {
        margin: auto;
        float: none;
    }

    .rule-title {
        font-size: 22px;
        text-align: center;
        color: white;
        font-weight: bold;
        background-image: linear-gradient(to right, #E25569, #FB9946);
        padding: 10px 10px;
        border-radius: 10px;
    }

    @media screen and (max-width: 768px) {

        ol,
        ul {
            margin-top: 0;
            margin-bottom: 10px;
            margin-left: -30px;
        }

        .rule-list li {
            font-size: 16px;
        }

        .rule-title {
            font-size: 18px;
            padding: 6px 6px;
        }
    }
    </style>
</head>

<body class="bg">
    <?php include("../actions-default.php");  back("index.php?save");?>
    <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
            <div class="col-sm-3 col-md-2 col-lg-2 col-xs-9 auto">
                <img src="image/logo.png" class="img-fluid" style="width:100%" />
            </div>

        </div>
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 auto">
                <h3 class="rule-title" style="">Rules</h3>
            </div>

        </div>


        <div class="row" style="margin-top:20px;">
            <div class="col-sm-10 col-md-7 col-lg-7 col-xs-12 auto">
                <ul type="dice" class="rule-list">

                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                </ul>
            </div>

        </div>


        <div class="row" style="margin-bottom:20px;">
            <div class="col-md-12 text-center">
                <a href="game.php">
                    <div class="btn btn-info btn-md auto" id="subbtn" style="">
                        Next</div>
                </a>
            </div>
        </div>



    </div>
    <script>
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