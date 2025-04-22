<?php
 session_start();
 error_reporting(0);
 session_start();
include_once 'dao/config.php';
$userid=$_SESSION['userId'];
 include_once '../check-rating.php';
 if($_SESSION['score']==''){
    //header('Location:'.$_SERVER['HTTP_REFERER']);
    }

$organizationId=$_SESSION['organizationId'];
$sessionId = $_SESSION['sessionId'];

$hidescore=false;
if($_SESSION["sessionId"]=="demobypass"){
    $hidescore=true;
}


if(isset($_SESSION["uniqueMsg"])){
    $printscore=$_SESSION["uniqueMsg"];
}else{
}

$isdemo=($_SESSION["sessionId"]=="demobypass")?true:false;
$isRated=check_rating();


$multidimentialArray=array();
$getData="select * from questions_round1";
$getData=execute_query($getData);
$getDatabaseTotal=mysqli_num_rows($getData);
while($get=mysqli_fetch_array($getData)){
    $multidimentialArray[]=$get;

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thank You</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style rel="stylesheet" type="text/css">
    @font-face {
        font-family: 'FiraSans-Medium';
        src: url('../imp/fonts/FiraSans-Medium.otf');
    }

    html {
        width: 100%;
        height: 100%;
    }

    .modal {
        overflow: auto !important;
    }

    body {
        font-family: 'FiraSans-Medium';
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: white;
        background-image: url(../imp/thankyou/background-desk.png);
        background-repeat: no-repeat;
        background-size: cover;
    }

    .words {
        width: 245px;
    }

    .auto {
        text-align: center;
    }

    .welcome-logo {
        width: 100%;
    }

    .container-control {
        margin-top: 40px;
    }

    .mob {
        display: none;
    }

    .desk {
        display: block;
    }

    ul li {
        font-family: 'FiraSans-Medium';
        font-size: 20px;
    }

    .begin {
        width: 130px;
        font-size: 18px;
        background: #e9695e;
        margin-top: 10px;
    }

    .thankyou-logo {
        width: 370px;
        margin-top: 60px;
    }

    .score {
        font-size: 35px;
        color: #424242;
        margin-top: 28px;
    }

    .rate {
        background: #0078b7;
        color: white;
        font-size: 19px;
        padding: 4px 10px;
        margin-top: 50px;
    }

    .rate:hover {
        color: white;
    }

    .modal-body p {
        font-size: 18px;
    }


    @media (min-width:100px) and (max-width:500px) {
        body {
            overflow: scroll;
            background-image: url(../imp/thankyou/background-mob.png);
        }

        .desk {
            display: none;
        }

        .mob {
            display: block;
        }

        .container-control {
            margin-top: 45px;
        }

        .welcome-logo {
            width: 200px;
            margin-top: 80px;
        }

        .thankyou-logo {
            width: 280px;
        }

        .score {
            font-size: 25px;
        }

        .rate {
            margin-top: 20px;
        }
    }
    </style>
</head>

<body>
    <style type="text/css" rel="stylesheet">
    .home-default {
        background-image: linear-gradient(to right, #E25569, #FB9946);
        color: white;
        font-size: 16px;
        padding: 3px 10px;
        border: none;
        font-weight: bold;
        border-radius: 5px;
    }

    .rate,
    .subscribe {
        background: #0078b7;
        color: white;
        font-size: 19px;
        padding: 4px 10px;
        margin-top: 50px;
    }

    #answerid {
        background: #0078b7;
        color: white;
        font-size: 19px;
        padding: 4px 10px;
        cursor: pointer;
        margin-top: 50px;
    }

    .back-default {
        background: #e9695e;
        color: white;
        font-size: 18px;
        padding: 1px 8px;
        border: none;
        margin-left: 10px;
        margin-right: 15px;
        margin-top: 0px;
        font-weight: bold;
        border-radius: 5px;
    }

    .extramileplay-logo {
        width: 100%;
        margin-top: 2px;
    }

    .logo-holder {
        width: 200px;
        margin-top: 3px;
        display: inline-block;
        padding-left: 15px;
        margin-right: 5px;
    }

    .back-holder {
        width: 100px;
        display: inline-block;
    }

    .score {
        display: none;
    }

    tr,
    td,
    th {
        border: 1px solid black;
        padding: 5px;
        width: 50%;

    }

    th {
        text-align: center;
    }

    .auto {
        margin: auto;
        float: none;
    }
    </style>
     <?php include("../actions-default.php");  back("https://extramileplay.com");?>

    <div class="container-fluid upperaction" style="margin-top:10px;">
        <!-- <div class="row">
            <div class="logo-holder"><a href="https://extramileplay.com"><img
                        src="https://extramileplay.com/php/imp/logo/extramileplay-new.png"
                        class="extramileplay-logo" /></a></div>
            <div class="back-holder" style="border-left:3px solid black;"><a href="https://extramileplay.com">
                    <div class="btn btn-info btn-md back-default">HOME</div>
                </a></div>
        </div> -->
        <div class="container-fluid container-control">
            <div class="row">
                <div class="col-md-12 auto">
                    <img src="../imp/thankyou/logo.gif" class="thankyou-logo" />
                </div>
                <div class="col-md-12 text-center score"
                    style="<?php if($_SESSION['sessionId']!="demobypass"){ echo "display:block";}?>">
                    <?php echo $printscore;?>
                </div>


                <!-- <div class="col-md-12 text-center" style="<?php if($isRated OR $isdemo){echo "display:none";}?>">
                    <div class="btn btn-md rate" onclick="rate()">Rate this game</div>
                </div> -->
                <!-- <div class="col-md-12 text-center">
                    <div class="btn btn-md" id="answerid">Click here to find out the answer</div>
                </div> -->
            </div>
        </div>
        <div class="modal" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <!-- <div class="modal-header">
                        <h4 class="modal-title" style=""></h4>
                    </div> -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 auto">
                                <table>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                    </tr>
                                    <?php 
                                    for ($i = 0; $i < count($multidimentionalArray); $i++) {
                                    echo '<tr>
                                    <td>'.$multidimentionalArray[i]["question_name"].'</td>
                                    <td>'.$multidimentionalArray[i]["correct_answer"].'</td>
                                    </tr>';
                                    }
                                  ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="modelclose"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="row" style="<?php if(!$isdemo){ echo "display:none";}?>">

            <div class="col-md-12 text-center">
                <a href="https://extramileplay.com/plans">
                    <div class="btn btn-md subscribe">Subscribe Now</div>
                </a>
            </div>
        </div>

    </div>

    <script type="text/javascript">
    $("#answerid").click(function() {
        $("#myModal").show();
    });
    $("#modelclose").click(function() {
        $("#myModal").hide();
    });

    function rate() {
        window.location = "../rate-default.php";
    }
    </script>

    <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
        if (event.keyCode == 123) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
    }
    </script>

</body>

</html>