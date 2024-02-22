<?php
session_start();
function set_message($message, $class){
  $_SESSION['message'] = $message;
  $_SESSION['class'] = $class;
}

function get_message(){
  if(isset($_SESSION['message'])){
    echo '<div class="alert ' . $_SESSION['class'] . '" role="alert">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
  }
}

// function checkLogin(){
//   // check if session exists and ID variavke exists
//   // If not send to login 
// }