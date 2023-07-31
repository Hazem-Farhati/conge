<?php 
include_once '../controller/user_controller.php';
include_once '../models/user.php';

$user=$_user->getUsers();

include_once '../views/includes/sidebar.php'
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>


<div class="container" >
<table class="table caption-top ms-5"style="margin: 0 200px;">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">firstname</th>
      <th scope="col">lastname</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">dob</th>
      <th scope="col">user_type</th>   
    </tr>
  </thead>
  <tbody>
    
       <?php 
    while($u = $user->fetch(PDO::FETCH_ASSOC)){?>
      <tr> 
         <td><?php echo $u['firstname']?></td>
        <td><?php echo $u['lastname']?></td>
        <td><?php echo $u['email']?></p>
        <td><?php echo $u['password']?></td>
        <td><?php echo $u['dob']?></td>
        <td><?php echo $u['user_type']?></td>
        <td>
            <a href="view_user.php?id=<?php echo $u['user_id']?>" class="btn btn-primary">View</a>
            <a href="edit_user.php?id=<?php echo $u['user_id']?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this record?');"
                href="delet_user.php?id=<?php echo $u['user_id']?>" class="btn btn-danger">Delete</a>
        </td>
  </tr>

    <?php   } ?>
   
  </tbody>
</table>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</body>
</html>


