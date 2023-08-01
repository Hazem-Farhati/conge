<?php 
require_once '../db/config.php' ;
require_once '../models/user.php' ;

function insert_user($_user){
    if(isset($_POST['submit'])){
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $dob=$_POST['dob'];
        $user_type=$_POST['user_type'];
        
     $orig_file = $_FILES["user_image"]["tmp_name"];
    $ext = pathinfo($_FILES["user_image"]["name"], PATHINFO_EXTENSION);
    $target_dir = '../uploads/';
    $profile_image = "$target_dir$fname.$ext";
    move_uploaded_file($orig_file,$profile_image);

    $result=$_user->InsertUser($fname,$lname,$email,$password,$dob,$user_type,$profile_image);
       
    
        if($result){
            echo 'succ';        
        }
        else{
           echo 'error';
                        } 
    }
}
function Login($_user){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = strtolower(trim($_POST['email']));
        $password = $_POST['password'];
        $new_password = md5($password.$email);
        $result = $_user->getUser($email,$new_password);
        if(!$result){
            echo "<div class='alert alert-danger'>Username or Password are incorrect</div>";
        }else{
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $result['user_id'];
if($_SESSION['email'] == "admin@gmail.com") {
            header("location: admin_home.php");
}else{
            header("location: home.php");

}

        }
    }
}
function delete_user($user){
    if(!$_GET['id']){
    // echo 'error';
    // include 'includes/error.php';
    header("location: users.php");
}else{
//get id values    
    $id=$_GET['id'];
// Call Crud Function
    $result=$user->deleteUser($id);
    //Redirct TO index.php
if($result){
    header("location:users.php");
}
    else
    {
      echo "error on delete";
}
}
}

function update_user($user){
     if(isset($_POST['submitUserUpdate'])){
        $id=$_POST['id'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $dob=$_POST['dob'];
        $user_type=$_POST['user_type'];
    $result=$user->updateUser($id,$firstname,$lastname,$email,$password,$dob,$user_type);
       
    
        if($result){
             header("Location: users.php");
    
        }
        else{
           echo 'error';
                        } 
    }
    if(!isset($_GET['id'])){
    header('location :users.php');
}
else {
    $id = $_GET['id'];
    $user = $user->getUserDetails($id);
}
}
function get_user_details($user){
    if(!isset($_GET['id'])){
echo "error on get user";
}else{

    $id = $_GET['id'];
    $result = $user->getUserDetails($id);}

}
?>