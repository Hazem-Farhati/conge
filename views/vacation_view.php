<?php

require_once 'includes/header.php';

require_once '../controller/vacationRequest_controller.php' ;


insert_vacation($vacation);
$results= $vacation->getVacationType();

?>

<link rel="stylesheet" href="../styles/vacation_view.css">
<div class="recipe-card">

	<aside>

		<img src="https://wallpaperaccess.com/full/42545.jpg" alt="Chai Oatmeal" />
		<a href="#" class="button"><span class="icon icon-play"></span></a>

	</aside>

	<article>

		<h2>Vacation Request</h2>

		<ul>
			<li><span class="icon icon-users"></span><span>First day : <?php echo $_POST['first_date'] ; ?></span></li>
			<li><span class="icon icon-users"></span><span>Last day : <?php echo $_POST['last_date'] ; ?></span></li>

        </ul>
    <h5>Description</h5>
		<p><?php echo $_POST['description'] ; ?></p>
		<p><?php echo $_POST['user_id'] ; ?></p>


	</article>

</div>

<br>
<br>
<br>
<br>
<br>
<br>
<?php
?>
<?php
require_once 'includes/footer.php' ;
?>