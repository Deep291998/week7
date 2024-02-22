<?php


if(isset($_POST['updateStudent'])){
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$marks = $_POST['marks'];
$imageURL = $_POST['imageURL'];


include('connect.php');


$query = "UPDATE students SET fname='$fname', lname='$lname', marks='$marks', imageURL='$imageURL' WHERE id='$id'";


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



