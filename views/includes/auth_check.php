<?php 
if(!isset( $_SESSION['user_id'])){
    header("location:../views/Login.php");
}
?>