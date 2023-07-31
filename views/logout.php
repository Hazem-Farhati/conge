<?php
require_once 'includes/session.php';
?>
<?php 
session_destroy();
header('Location: Login.php');
?>