<?php 
require_once '../db/config.php' ;
require_once '../views/includes/session.php';
require_once '../controller/user_controller.php' ;
require_once '../models/user.php';
function insert_vacation($vacation){
        // if(isset( $_SESSION['user_id'])){
        //         $id=$_SESSION['user_id'];
        //         $reslut=$user->getUserByUser_id($id);
        //     }
    if(isset($_POST['submitVacation'])){
         $user_id=$_POST['user_id'];
         $description=$_POST['description'];
          $vt_id=$_POST['vt_id'];
        $first_date=$_POST['first_date'];
        $last_date=$_POST['last_date'];
       
    $result=$vacation->InsertVacation($user_id,$vt_id,$description,$first_date,$last_date);
        if($result){
            echo '';
        }
        else{
           echo 'error';
        } 
    }
}
function update_vacation($vacation){
    if(isset($_POST['submitVacationUpdate'])){
  $id =$_POST['id'];
  $first_date =$_POST['first_date'];
  $last_date =$_POST['last_date'];
    $description =$_POST['description'] ;
  $vt_id =$_POST['vt_id'] ;
  $answer =$_POST['answer'] ;



  $result = $vacation->updateVacation($id,$description,$first_date,$last_date,$vt_id,$answer);
  //redirected to index
  if($result) {
    header("Location: admin_home.php");
  }
  else {
   echo "error on update";
  }
}

}
function delete_vacation($vacation){
    if(!$_GET['id']){
    // echo 'error';
    // include 'includes/error.php';
    header("location: admin_home.php");
}else{
//get id values    
    $id=$_GET['id'];
// Call Crud Function
    $result=$vacation->deleteVacation($id);
    //Redirct TO index.php
if($result){
    header("location:admin_home.php");
}
    else
    {
      echo "error on delete";
}
}
}

function edit_vacation($vacation){
    if(!isset($_GET['id'])){
    header('location : admin_home.php');
}
else {
    $id = $_GET['id'];
    $vaction = $vacation->getVacationDetails($id);

}
}
?>
      
