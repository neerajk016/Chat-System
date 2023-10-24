<?php

$room=$_POST['room'];


if(strlen($room)>20 or strlen($room)<2){
    $message="please choose a name between 2 to 20 charcter";
    echo '<script language="javascript">';
    echo "alert('".$message."');";
    echo 'window.location=""http://localhost/chatroom"";';
    echo "</script>";

    
}else if(!ctype_alnum($room)){
    $message="please choose a alphanumeric room name";
    echo '<script language="javascript">';
    echo "alert('".$message."');";
    echo 'window.location="http://localhost/chatroom";';
    echo "</script>";

}else{
    include "db_connect.php";
}



$sql="SELECT * FROM `rooms` WHERE roomname='$room'";
$result=mysqli_query($conn,$sql);
if($result){
    if(mysqli_num_rows($result)>0){
        $message="please choose a different room name";
        echo '<script language="javascript">';
        echo "alert('".$message."');";
        echo 'window.location="http://localhost/chatroom";';
        echo "</script>";

    }
    else{
        $sql="INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$room', current_timestamp);";
        if(mysqli_query($conn,$sql)){
            $message="your room is ready";
            echo '<script language="javascript">';
            echo "alert('".$message."');";
            echo 'window.location="http://localhost/chatroom/rooms.php?roomname='.$room.'";';
            echo "</script>";

        }
    }
}
else{
    echo "error:".mysqli_error($conn);
}












?>