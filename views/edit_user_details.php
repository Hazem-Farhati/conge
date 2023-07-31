<?php 
require_once 'includes/header.php';

require_once '../db/config.php' ;
require_once '../controller/user_controller.php'; 

//Get Values from Post Operation
update_user($_user);
?>


<?php
require_once 'includes/footer.php' ;
?>