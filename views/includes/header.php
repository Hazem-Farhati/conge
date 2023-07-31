<?php 
include_once 'session.php';
require_once '../controller/user_controller.php' ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
     
      <?php  if(isset( $_SESSION['user_id'])){
        
      ?>   
       <li class="nav-item active">
        <a class="nav-link" href="../views/home.php">Home <span class="sr-only">(current)</span></a>

    
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../views/vacation_view.php">My Vacation request</a>
      </li><?php 
      }?>
 
    
 
      </li>
    </ul>
  </div>

      <ul class="navbar-nav mr-auto">
           <?php
           
            if(isset( $_SESSION['user_id'])){
                $id=$_SESSION['user_id'];

                $reslut=$_user->getUserByUser_id($id);
            }
              if(!isset($_SESSION['user_id'])){
          ?>
            <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
            <?php } else {
  if(isset( $_SESSION['user_id'])){
                ?>
            <?php }?>
            <a href="#" class="nav-link"><span>Hello ! <?php echo $reslut['firstname'] ?></span> <span
                    class="sr-only"></span></a>
            <a class="nav-item nav-link" href="logout.php">Logout</a>
            <?php } ?>
    
      </ul>

    </ul>
</nav>
<div class="container">

