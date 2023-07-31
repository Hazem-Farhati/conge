<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php

require_once '../db/config.php' ;
require_once '../controller/user_controller.php'; 
if(!isset($_GET['id'])){
    // echo 'error';
    header('location : users.php');
}
else {
    $id = $_GET['id'];
    $result = $_user->getUserDetails($id);
?>
<div class="container ml-5">
<h1 class="text-center">Edit User</h1>
<form method="post" action="edit_user_details.php">
    <input type="hidden" name="id" value="<?php echo $result['user_id']?>" >
    <div class="mb-3">
    <label for="firstname" class="form-label">firstname</label>
    <input type="text" class="form-control" id="ld" value="<?php echo $result['firstname']?>"  name="lastname" >
  </div>
     <div class="mb-3">
    <label for="lastname" class="form-label">lastname</label>
    <input type="text" class="form-control" id="ld" value="<?php echo $result['lastname']?>"  name="lastname" >
  </div>

     <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="text" class="form-control" id="email" value="<?php echo $result['email']?>"   name="email" >
  </div>
  
     <div class="mb-3">
    <label for="password" class="form-label">password</label>
    <input type="text" class="form-control" id="password" value="<?php echo $result['password']?>"   name="password" >
  </div>

   <div class="mb-3">
    <label for="dob" class="form-label">dob</label>
    <input type="text" class="form-control" id="dob" value="<?php echo $result['dob']?>"   name="dob" >
  </div>

    <div class="mb-3">
    <label for="user_type" class="form-label">user_type</label>
    <input type="text" class="form-control" id="user_type" value="<?php echo $result['user_type']?>"   name="user_type" >
  </div>
  <button type="submit" name="submitUserUpdate" class="btn btn-success btn-block">Save Changes</button>
            <a href="users.php" class="btn btn-primary">Back to List</a>
   
</form>
</div>
<?php }?>
<br>
