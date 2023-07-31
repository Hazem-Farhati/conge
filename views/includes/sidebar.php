<!--Main Navigation-->
<?php 
include_once 'session.php';
require_once '../controller/user_controller.php' ;
?>
<header>
<link rel="stylesheet" href="../styles/admin.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-2 mt-=5">
   
        <a href="admin_home.php" class="list-group-item list-group-item-action py-2 ripple active">
          <i class="fas fa-chart-area fa-fw me-3"></i><span>Request</span>
        </a>
        <a href="users.php" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-lock fa-fw me-3"></i><span>Users</span></a
        >
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
    
    <a href="logout.php" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-money-bill fa-fw me-3"></i><span>Logout</span></a
        >            <?php } ?>
    
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->

  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
  <div class="container pt-4"></div>
  
</main>
<!--Main layout-->
