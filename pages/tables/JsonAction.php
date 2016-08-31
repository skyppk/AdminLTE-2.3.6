<?php
header("Content-Type:text/html; charset=utf-8");
?> 


<?php
require_once ('conn/conn.php');

date_default_timezone_set("Asia/Hong_Kong");

$var_ACTION="";


if(isset($_GET["ACTION"]) && trim($_GET["ACTION"])!=""){
	$var_ACTION=$_GET["ACTION"];
}else{
	$var_ACTION="";
}

if($var_ACTION=='getbooking'){
    $sql = "select booking.id as id , member, phone, name, from_unixtime(unix, '%D-%b-%Y %H:%i:%s') as unix, round(length/1000/60/60, 1) as length, amount from booking 
    inner join user on booking.member = user.username
    inner join location on booking.idLocation = location.id ;";
    $result = mysqli_query($conn,$sql); 
    $rows = array();
    while($r = mysqli_fetch_assoc($result)){ 
   	    $rows[] = $r;
        }
    mysqli_close($conn);
    $jsonArray = array("data" => $rows);

    $json = json_encode($jsonArray);
//    $json = json_encode($rows);
//    if ($json != '') {
//        echo $json;
//    } else {
//        echo "null";
//    }		
    echo $json;
}

if($var_ACTION=='getuser'){
    if(isset($_POST['usercode'])){
        $sql = "update user set status = 'Locked' where id = {$_POST['usercode']} ; ";
        mysqli_query($conn,$sql);
    }
    
    $sql = "select * from user ;";
    $result = mysqli_query($conn,$sql);
    
    $rows = array();
    while($r = mysqli_fetch_assoc($result)){ 
   	    $rows[] = $r;
        }
        mysqli_close($conn);
    $jsonArray = array("data" => $rows);

    $json = json_encode($jsonArray);
//    if ($json != '') {
//        echo $json;
//    } else {
//        echo "null";
//    }		
    echo $json;

    
}

if($var_ACTION=='getitem'){
    $sql = "select * from item ;";
    $result = mysqli_query($conn,$sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)){ 
   	    $rows[] = $r;
        }
//    $jsonArray = array("data" => $rows);
    mysqli_close($conn);
//    $json = json_encode($rows);
    $jsonArray = array("data" => $rows);

    $json = json_encode($jsonArray);
//    if ($json != '') {
//        echo $json;
//    } else {
//        echo "null";
//    }		
    echo $json;
}

if($var_ACTION=='getlocation'){
    $sql = "select * from location ;";
    $result = mysqli_query($conn,$sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)){ 
   	    $rows[] = $r;
        }
//    $jsonArray = array("data" => $rows);
    mysqli_close($conn);
//    $json = json_encode($rows);
    $jsonArray = array("data" => $rows);

    $json = json_encode($jsonArray);
//    if ($json != '') {
//        echo $json;
//    } else {
//        echo "null";
//    }		
    echo $json;
}

if($var_ACTION=='getorder'){
    $sql = "select * from orderlist 
    inner join user on orderlist.member = user.username
    inner join item on orderlist.idItem = item.id ;";
    $result = mysqli_query($conn,$sql); 
    $rows = array();
    while($r = mysqli_fetch_assoc($result)){ 
   	    $rows[] = $r;
        }
    mysqli_close($conn);
//    $json = json_encode($rows);
    $jsonArray = array("data" => $rows);

    $json = json_encode($jsonArray);
//    if ($json != '') {
//        echo $json;
//    } else {
//        echo "null";
//    }		
    echo $json;
}
?>