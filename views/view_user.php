<?php
$title ='view records';
require_once 'includes/header.php';
require_once 'includes/auth_check.php' ;
require_once '../db/config.php';
require_once '../controller/user_controller.php'; 

//get attendee by id 
if(!isset($_GET['id'])){
echo "error";
}else{

    $id = $_GET['id'];
    $result = $_user->getUserDetails($id);}

?>
<img src=<?php echo $profile_image ?> style="width: 26%;" />

<div class="card" style="width: 18rem;margin-top:20px">
  <div class="card-body">


    <h5 class="card-title"><?php echo $result['firstname'] .' '.$result['lastname']  ?></h5>
    <p href="#" class="card-text"> Email : <?php echo $result['email'] ?></p>
    <p href="#" class="card-text">Date of birth <?php echo $result['dob'] ?></p>
    <p href="#" class="card-text">User function <?php echo $result['user_type'] ?></p>
    
  </div>

</div>
<br>
            <a href="users.php" class="btn btn-primary">Back to List</a>
          
<?php require_once 'includes/footer.php'?>
