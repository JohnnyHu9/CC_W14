<?php
session_start();
//session_unset();
$_SESSION["username"] = '';
$_SESSION["isloggedin"] = false;

if(isset($_SERVER['HTTP_REFERER'])) {
 header('Location: '.$_SERVER['HTTP_REFERER']);  
} else {
    header("location: business_contact.php");
}
exit;

?>