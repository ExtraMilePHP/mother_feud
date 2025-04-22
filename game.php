<?php
ob_start();
error_reporting(0);
session_start();
if($_SESSION['token'] == ""){
   header('location:index.php');
}

include_once 'dao/config.php';

$userid=$_SESSION["userId"];
$email=$_SESSION["email"];
$organizationId = $_SESSION['organizationId'];
$sessionId = $_SESSION['sessionId'];
// echo $_SESSION['organizationId'];



mysqli_set_charset( $con, 'utf8');

$checking="select * from stat where userid='$userid' and organizationId='$organizationId' and sessionId='$sessionId' and round='round1'";
$checking=execute_query($checking);
$count=mysqli_num_rows($checking);
if($count>0){
    $points=mysqli_fetch_object($checking);
    $points=$points->points;
    $_SESSION['uniqueMsg']=" Your score is ".$points."";
    header("Location: thankyou.php");
}


if($_SESSION['sessionId']=="demobypass"){
    $totalquestionshow=1;
}else{
    $totalquestionshow=10;
}


$multidimentialArray=array();
$getData="select * from questions_round1";
$getData=execute_query($getData);
$getDatabaseTotal=mysqli_num_rows($getData);
while($get=mysqli_fetch_array($getData)){
    $multidimentialArray[]=$get;

}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Mother's day Feud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=6">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="js/sweetalert.min.js"></script>
    <style>
    .selectedClass {
        /* background: #E25569 !important; */
        border: 5px solid yellow;
        color: #000000 !important;

    }


    
    .option-text {
        /* border-left: 25px solid #e25569; */
        background-image: url("image/Options_Tabs.png");
        background-size: 100% 100% !important;
        background-repeat: repeat !important;
        text-align: center;

    }

    .progress {

        border: 1px solid black;
        background-color: #f88d8d !important;

    }

    #tab1 span,
    #tab2 span,
    #tab3 span,
    #tab4 span {
        color: #fff;
    }

    @media (min-width: 100px) and (max-width: 768px) {
        .bg {
            width: 100%;
            background-image: url("image/mob.png");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .optionpopup {
            font-size: 26px;
            color: white;
            background-image: url("image/Options_list_BG.png");
            background-size: 100% 100% !important;
            background-repeat: repeat !important;
            height: 275px;
            width: 90%;
        }

        .option-text {
            height: 60px;
            padding: 8px;
            width: 100%;

            position: relative;
            margin: auto;

        }

        #tab1 {
            margin-top: 20px;
        }

        #tab1 span,
        #tab2 span,
        #tab3 span,
        #tab4 span {
            width: 320px;
            position: relative;
            display: table-cell;
            vertical-align: middle;
            height: 40px;
        }

        .questionpop {
            margin-top: 30px;
        }
    }



    @media (min-width:768px) {
        .optionpopup {
            font-size: 26px;
            color: white;
            background-image: url("image/Options_list_BG.png");
            background-size: 100% 100% !important;
            background-repeat: repeat !important;
            height: 310px;
            padding: 30px;
            width: 800px;
            display: grid;
            opacity: 0;
            top: -60px;
        }

        #tab1 span,
        #tab2 span,
        #tab3 span,
        #tab4 span {
            width: 320px;
            position: relative;
            display: table-cell;
            vertical-align: middle;
            height: 60px;
        }

        .option-text {
            height: 80px;
            padding: 8px !important;
            line-height: 1.3;
        }

        .questionpop {
            margin-top: 30px;
        }

        .new-question {
            opacity: 0;
            top: 30px;
            /* width: 600px; */
            position: relative;
            margin: auto;
            float: none;
            width: 700px;
        }

        /* .new-question span {

            width: 700px;
        } */
    }

    #tab1,
    #tab2,
    #tab3,
    #tab4 {
        display: none;
    }

    .new-question span {
        /* display: table-cell;
        vertical-align: middle;
        text-align: center; */
        height: 125px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .new-question {
        opacity: 0;
        top: 30px;
        text-align: center;

    }

    .show-score {
        color: white;
        width: 70px;
    }



    .modal-content {
        box-shadow: none !important;
        border: none !important;
        height: 100%;
        position: relative;
        position: relative;
        background-color: transparent;
        margin-top: 40%;

    }

    .your-score {
        background-image: url("image/Score.png");
        background-size: 100% 100% !important;
        background-repeat: repeat !important;

        padding: 10px;
        margin-right: 10px;
        width: 100px;
    }

    .modal-header {
        border-bottom: none !important;
    }



    #tab1 #tab2 #tab3 #tab4 {
        display: inline-table !important;
    }

    p {
        width: 50px;
        position: relative;
        margin: auto;
        top: -40px;
        color: white;
        transform: scale(1);
        user-select: none;
        display: none;
    }
    </style>
</head>

<body class="bg">

    <?php   
  if(isset($_SESSION["userPlayedCount"])){
        if($_SESSION['userPlayedCount']>=1){
             echo '<script type="text/javascript">';
        echo 'swal("You have already played this game", "","success").then( () => {
               location.href = "https://extramileplay.com";
           });</script>';      
   }
    }
?>

    <?php include("../actions-default.php");  back("index.php?save");?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-4 your-score" style="color: yellow;
    margin-left: 18px;
    margin-top: 10px;color:yellow;">
                <div class="timer local-timer">00:00</div>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-4 your-score" style="float:right;color:yellow;margin-top: 10px;">
                <span class="show-score" style="font-weight:bold;color:yellow;">0</span>
                <!-- <p id="currentscore"></p> -->
            </div>

        </div>
        <div class="row">
            <div class="col-md-8 col-sm-9 col-xs-12 auto questionpop">
                <div class="col-md-12 new-question"><span>Q.1 Question 1</span></div>
                <div class="col-md-12 question_hint"></div>

            </div>

        </div>
        <div class="row">
            <div class="col-md-8 col-sm-9 col-xs-12 auto optionpopup">
                <div class="col-md-12 col-xs-12 option-container auto">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="option-text deselectedClass" id="tab1" pos="0"><span>A. Option A
                            </span>
                            <p id="currentscore1">fdhfg</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="option-text deselectedClass" id="tab2" pos="1"><span>B. Option B</span>
                            <p id="currentscore2">fdhfg</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 option-container auto">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="option-text deselectedClass" id="tab3" pos="2"><span>C. Option C</span>
                            <p id="currentscore3">fdhfg</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="option-text deselectedClass" id="tab4" pos="3"><span>D. Option D</span>
                            <p id="currentscore4">fdhfg</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="popupgif">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body scroll-bar">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12 auto">
                                <img src="image/Awesome.gif" style="width:100%"></img>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/howler.min.js"></script>
    <script type="text/javascript">
    // settings start //
    var databaseProvided = <?php echo $getDatabaseTotal;?>; // total number of data availalble in database
    var wantToShow = <?php echo $totalquestionshow;?>; // auto calculated +1 for flip question
    var perPointValue = 10; // multiply by each currect answer
    var timeoutData = 45;

    var allAudio = [
        "audio/CrowdReaction.mp3",
        "audio/correct_button.mp3",
        "audio/success.mp3",
        "audio/wrong.mp3",

    ];
    var audioplayer = [];
    var audioCallback;
    allAudio.map(function(ele, ind) {
        audioplayer[ind] = new Howl({
            src: [ele],
            preload: true,
            onend: function() {
                audioCallback != undefined ? audioCallback(ind) : "";
            }
        });
    });

    function audioPlayerController(index, callback) {
        audioCallback = callback;
        audioplayer.map(function(ele) {
            ele.stop()
        });
        audioplayer[index].play();
    }

    // $(document).ready(function() {

    $(document).ready(function() {

        // $(".optionpopup").animate({

        //     opacity: "1",
        //     top: "10px",
        //     display: "inline-table"
        // }, 1500, function() {
        // });

        $(".new-question").css({
            opacity: "0",
            top: "60px"
        });

        $("#tab1").css("display", "none");
        $("#tab2").css("display", "none");
        $("#tab3").css("display", "none");
        $("#tab4").css("display", "none");

        $(".optionpopup").css({
            opacity: "0",
            top: "-60px"
        });



    });
    //});

    function shuffle(array) {
        var currentIndex = array.length,
            temporaryValue, randomIndex;

        // While there remain elements to shuffle...
        while (0 !== currentIndex) {

            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            // And swap it with the current element.
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }

        return array;
    }

    target = document.getElementsByClassName('local-timer')[0],
        seconds = 0, minutes = 0, hours = 0;
    var t;

    function add() {
        seconds++;
        if (seconds >= 60) {
            seconds = 0;
            minutes++;
            if (minutes >= 60) {
                minutes = 0;
                hours++;
            }
        }

        target.textContent = (minutes ? (minutes > 9 ?
            minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

        timer();
    }

    function timer() {
        t = setTimeout(add, 1000);
    }
    timer();


    localTimer(true);
    var localInterval;

    function localTimer(runCommand) {
        var runPlus = timeoutData;
        if (runCommand) {
            runPlus = timeoutData;
        }
        localInterval = setInterval(runtime, 1000);

        function runtime() {
            if (runPlus == 0) {
                //skipQuestion();  // run next question with some configuration
            } else {
                runPlus = runPlus - 1;
                // $(".local-timer").html(runPlus);
            }
            console.log("working");
        }
    }


    var pos = 0;
    var mainid_temp = [];
    var questions_temp = [];
    var question_hint_temp = [];
    var option_one_temp = [];
    var option_two_temp = [];
    var option_three_temp = [];
    var option_four_temp = [];
    var point1_temp = [];
    var point2_temp = [];
    var point3_temp = [];
    var point4_temp = [];
    var answers_temp = [];
    var answerID_temp = [];
    var questions = [];
    var question_hint = [];
    var option_one = [];
    var option_two = [];
    var option_three = [];
    var option_four = [];
    var point1 = [];
    var point2 = [];
    var point3 = [];
    var point4 = [];
    var answers = [];
    var answerID = [];
    var question_count = 0;
    var selected = false;
    var answer = 0;
    var points = 0;
    var finalShow = wantToShow;
    var multidimentionalArray = <?php echo json_encode($multidimentialArray) ?>;
    var uniqueNumbers = [];
    var userid = "<?php echo $userid;?>";
    var life = [0, 0, 0];

    var correct_anser;
    var doubleDip = false;
    var doubleDipArray = [];

    //// IMPORTANT ////
    /// id of the table must have sequence or you will get error ////
    while (uniqueNumbers.length < finalShow) {
        var r = Math.floor(Math.random() * databaseProvided) + 1;
        if (uniqueNumbers.indexOf(r) === -1) uniqueNumbers.push(r);
    }


    for (var i = 0; i < multidimentionalArray.length; i++) {
        var convertID = parseInt(multidimentionalArray[i]["id"]); /// please keep id sequence in database
        if (uniqueNumbers.includes(convertID)) {
            questions_temp.push(multidimentionalArray[i]["question_name"]);
            question_hint_temp.push(multidimentionalArray[i]["question_hint"]);
            option_one_temp.push(multidimentionalArray[i]["option_one"]);
            option_two_temp.push(multidimentionalArray[i]["option_two"]);
            option_three_temp.push(multidimentionalArray[i]["option_three"]);
            option_four_temp.push(multidimentionalArray[i]["option_four"]);
            point1_temp.push(multidimentionalArray[i]["point1"]);
            point2_temp.push(multidimentionalArray[i]["point2"]);
            point3_temp.push(multidimentionalArray[i]["point3"]);
            point4_temp.push(multidimentionalArray[i]["point4"]);
            answers_temp.push(multidimentionalArray[i]["correct_answer"]);
            answerID_temp.push(multidimentionalArray[i]["answer_id"]);
            mainid_temp.push(multidimentionalArray[i]["id"]);
        } else {
            console.log("excludedv" + i);
        }

    }

    var shuffled = shuffle(uniqueNumbers);


    for (var i = 0; i < shuffled.length; i++) {
        var shufflePos = shuffled[i];
        for (var l = 0; l < uniqueNumbers.length; l++) {
            if (shufflePos == mainid_temp[l]) {
                questions.push(questions_temp[l]);
                question_hint.push(question_hint_temp[l]);
                option_one.push(option_one_temp[l]);
                option_two.push(option_two_temp[l]);
                option_three.push(option_three_temp[l]);
                option_four.push(option_four_temp[l]);
                point1.push(point1_temp[l]);
                point2.push(point2_temp[l]);
                point3.push(point3_temp[l]);
                point4.push(point4_temp[l]);
                answers.push(answers_temp[l]);
                answerID.push(answerID_temp[l]);
            }
        }
    }

    console.log(question_hint);
    console.log(point1,"points 1");



    writeQuestion(question_count);


    function writeQuestion(location) {

        $(".new-question").css({
            opacity: "0",
            top: "60px"
        });

        $("#tab1").css("display", "none");
        $("#tab2").css("display", "none");
        $("#tab3").css("display", "none");
        $("#tab4").css("display", "none");

        $(".optionpopup").css({
            opacity: "0",
            top: "-60px"
        });

        $(".new-question").animate({
            opacity: "1",
            top: "0px"
        }, 1000, function() {
            $(".optionpopup").animate({
                opacity: "1",
                top: "10px",
                display: "inline-table"
            }, 1000, function() {
                $("#tab1").fadeIn('slow', function() {
                    $("#tab2").fadeIn('slow', function() {

                        $("#tab3").fadeIn('slow', function() {
                            $("#tab4").fadeIn('slow', function() {});
                        });
                    });
                });
            });
        });



        var randomval = [0, 1, 2, 3];
        shuffle(randomval);
        console.log(randomval);

        $(".new-question span").eq(0).html((location + 1) + ". " + questions[location]);
        $(".question_hint").eq(0).html(question_hint[location]);
        $(".option-text span").eq(randomval[0]).html(option_one[location]);
        $(".option-text").eq(randomval[0]).attr("data", point1[location]);

        $(".option-text span").eq(randomval[1]).html(option_two[location]);
        $(".option-text").eq(randomval[1]).attr("data", point2[location]);

        $(".option-text span").eq(randomval[2]).html(option_three[location]);
        $(".option-text").eq(randomval[2]).attr("data", point3[location]);

        $(".option-text span").eq(randomval[3]).html(option_four[location]);
        $(".option-text").eq(randomval[3]).attr("data", point4[location]);
        correct_anser = answers[location];
        console.log(correct_anser);
    }

    var clickEnabled = true;
    $(".option-text").click(function() {
        if (!clickEnabled) return; // If click event is disabled, return without processing
        clickEnabled = false;

        audioPlayerController(1, function() {
            //console.log("comppleter");
        });
        // var audio = new Audio('audio/correct_button.mp3');
        // audio.play();

        var pos = parseInt($(this).attr("pos"));
        console.log("pos===" + pos);

        question_count = question_count + 1;
        selected = false;
        prepareAnswer = answerID[question_count - 1]
        console.log(prepareAnswer);
        var points1 = parseInt($(this).attr("data"));
        console.log("points1===" + points1);
        points = points + points1;
        $(".show-score").eq(0).html(points);
        $(this).children('p').css({
            "display": "block",
            "opacity": "1"
        });
        $(this).children('p').text(points1);

        $(this).children('p').animate({
            "zoom": "6",
            "top": "-10px",
            "opacity": "0"
        }, 2000);

        setTimeout(() => {
            $(this).children('p').stop(true, true).css({
                "display": "none", // Hide the element
                "opacity": "1", // Reset opacity to initial state
                "zoom": "1", // Reset zoom to initial state
                "top": "-40px" // Reset position to initial state
            }).text(''); // Clear the text content
        }, 2000);

        for (var i = 0; i < 4; i++) {
            if (i == pos) {
                $(".option-text").eq(pos).removeClass("deselectedClass");
                $(".option-text").eq(pos).addClass("selectedClass");
                selected = true;
                answer = pos + 1;
                continue;
            }
            $(".option-text").eq(i).removeClass("selectedClass");
            $(".option-text").eq(i).addClass("deselectedClass");

        }
        setTimeout(() => {

            // $(this).children('p').toggle({
            //     effect: "scale",
            //     direction: "horizontal"
            // });

            if (question_count == finalShow) {
                destroy();
            } else {

                setTimeout(function() {
                    clearInterval(localInterval);
                    writeQuestion(question_count);

                    localTimer(true);
                }, 1000);
            }
            $(".option-text").removeClass("selectedClass");
            $(".option-text").addClass("deselectedClass");
            setTimeout(() => {
                clickEnabled = true;
            }, 1000);

        }, "1500");


    });


    $(".submit-button").click(function() {
        if (selected) {
            finalSubmit();
        } else {
            alert("please select options");
        }
    });


    function finalSubmit() {
        question_count = question_count + 1;
        selected = false;
        prepareAnswer = answerID[question_count - 1]
        console.log(prepareAnswer);
        // console.log("point1",point1);

        // if (answer == 1) {
        //     points = points + point1 ;
        //     $(".show-score").eq(0).html(points);

        // }

        if (prepareAnswer == answer) {
            console.log("question matched");
            //swal(correct_anser, "Yes this is correct answer", "success");
            // points = points + 1;
            // $(".show-score").eq(0).html(points);
        } else {
            console.log("question not matched");
            //swal("Sorry, wrong answer", correct_anser + " is correct answer", "error");
        }

        if (question_count == finalShow) {
            audioPlayerController(0, function() {
                //console.log("comppleter");
            });
            destroy();
        } else {

            setTimeout(function() {
                clearInterval(localInterval);
                writeQuestion(question_count);
                progressBar(question_count);
                localTimer(true);
            }, 1000);
        }
        $(".option-text").removeClass("selectedClass");
        $(".option-text").addClass("deselectedClass");
    }




    function destroy() {
        clearTimeout(t);
        var lastTime = $('.local-timer').html();


        $.ajax({
            type: "POST",
            url: "submit.php",
            data: "time=" + lastTime + "&points=" + (points) + "&userid=" + userid,
            success: function(d) {
                console.log(d);
                var data = JSON.parse(d);
                if (data.success == "true") {
                    $("#popupgif").show();
                    setTimeout(() => {
                        $("#popupgif").hide();
                        location.href = ("thankyou.php");
                    }, "1500");

                    } else if (data.isdemo == "true") {
                        // alert("dem0");
                        // window.location = "<?php echo $base_url?>/plans";
                    swal("Thank you for playing.Subscribe to any PLAN to play with your peers.", "",
                        "success").then(() => {
                            
                            window.location = "<?php echo $base_url?>/plans";
                    });
                    $("#popupgif").show();
                    setTimeout(() => {
                        $("#popupgif").hide();
                        location.href = ("thankyou.php");
                    }, "1500");
                }
            }
        });
    }
    </script>

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