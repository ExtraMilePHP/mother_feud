<?php 
ob_start();
error_reporting(0);
session_start();

include_once 'dao/config.php';
include_once '../add_report.php';

$time=$_POST["time"];
$points=$_POST["points"];
$email=$_SESSION["email"];
$userid=$_POST["userid"];
$lifeline=$_POST["lifeline"];
$reload=$_POST["reload"];

$organizationId = $_SESSION['organizationId'];
$sessionId = $_SESSION['sessionId'];

$roles = $_SESSION['roles'];
$gameId = $_SESSION['gameId'];
 $fullName = $_SESSION['firstName']." ".$_SESSION['lastName'];
$_SESSION['score']=1;


if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
$timestamp = date('Y-m-d H:i:s');


$_SESSION['userPlayedCount']=1;

if($_SESSION['sessionId']=="demobypass"){

$_SESSION['uniqueMsg']="Challenge your peers to this game by subscribing now!";


$query="INSERT INTO `stat`(`userid`,`email`,`organizationId`, `sessionid`,`time`, `points`,`round`,`timestamp`) VALUES ('$userid','$email','$organizationId','$sessionId','$time','$points','round1','$timestamp')";
if(execute_query($query)){
    echo json_encode(array("success"=>"false","isdemo"=>"true"));
   
}else{
    echo "something went wrong ".mysqli_error($con);
}

}else{

$_SESSION['uniqueMsg']=" Your score is ".$points."";


$query="INSERT INTO `stat`(`userid`,`email`,`organizationId`, `sessionid`,`time`, `points`,`round`,`timestamp`) VALUES ('$userid','$email','$organizationId','$sessionId','$time','$points','round1','$timestamp')";

    if(execute_query($query)){
        $time = "00:" . $time;
        if($roles == "GUEST_USER"){
            function successResponse($tools){
                echo json_encode(array("success"=>"true","isdemo"=>$tools["isdemo"]));
            }
            $data=["gameId"=>$gameId,"name"=>$fullName,"sessionId"=>$sessionId,"userId"=>$userid,"organizationId"=>$organizationId,"points"=>$points,"time"=>$time,"ans"=>""];
            addReportGuest($data);
          }else{

    function successResponse($tools){
        echo json_encode(array("success"=>"true","isdemo"=>$tools["isdemo"]));
    }
       $data=["points"=>$points,"time"=>$time];
       addReport($data);

}
    }else{
        echo "something went wrong ".mysqli_error($con);
    }
     
}
?>