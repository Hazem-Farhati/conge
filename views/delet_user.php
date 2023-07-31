<?php 
require_once 'includes/header.php';

require_once '../db/config.php' ;
require_once '../controller/user_controller.php'; 

//Get Values from Post Operation
delete_user($_user);
?>

<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php' ;
?>