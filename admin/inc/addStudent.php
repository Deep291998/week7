<?php


if(isset($_POST['addgrades'])){
    
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$marks = $_POST['marks'];
$imageURL = $_POST['imageURL'];


include('connect.php');


$query = 'INSERT 
                INTO `students` (`fname`,`lname`,`marks`,`imageURL`) 
                VALUES (
                    "' . mysqli_real_escape_string($connect, $fname) . '",
                    "' . mysqli_real_escape_string($connect, $lname) . '",
                    "' . mysqli_real_escape_string($connect, $marks) . '",
                    "' . mysqli_real_escape_string($connect, $imageURL) . '")';

$student = mysqli_query($connect, $query);
if($student){
header('Location: ../index.php');
}
else{
  echo mysqli_error($connect);
}

}else{
    echo"you are not here";
}



