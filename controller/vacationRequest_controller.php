<?php 
require_once '../db/config.php' ;

function insert_vacation($vacation){
    if(isset($_POST['submitVacation'])){
        
         $description=$_POST['description'];
        $first_date=$_POST['first_date'];
        $last_date=$_POST['last_date'];
        $vt_id=$_POST['vt_id'];
    $result=$vacation->InsertVacation($vt_id,$description,$first_date,$last_date);
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
      
