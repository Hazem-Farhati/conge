<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php
// require_once 'includes/header.php';

require_once '../db/config.php' ;
require_once '../controller/vacationRequest_controller.php'; 


if(!isset($_GET['id'])){
    // echo 'error';
    include 'includes/errormessage.php';
    header('location : viewrecords.php');
}
else {
    $id = $_GET['id'];
    $result = $vacation->getVacationDetails($id);
$results= $vacation->getVacationType();
?>
<style>

input[disabled] {
  cursor: not-allowed; /* Set the cursor to "not-allowed" */
}
select[disabled] {
  cursor: not-allowed; /* Set the cursor to "not-allowed" */
}
</style>
<div class="container mt-5">
<h1 class="text-center">Edit Conge</h1>
<form method="post" action="edit_conge_admin.php">
    <input type="hidden" name="id" value="<?php echo $result['vacation_id']?>"  >
  <div class="mb-3">
    <label for="first_date" class="form-label">Last Day</label>
    <input disabled type="date" class="form-control cursor-na" id="ld" value="<?php echo $result['first_date']?>" aria-describedby="lastnameHelp" name="last_date" >
  </div>
     <div class="mb-3">
    <label for="last_date" class="form-label">Last Day</label>
    <input disabled type="date" class="form-control" id="ld" value="<?php echo $result['last_date']?>" aria-describedby="lastnameHelp" name="last_date" >
  </div>

     <div class="mb-3">
    <label for="description" class="form-label">description</label>
    <input disabled type="text" class="form-control" id="description" value="<?php echo $result['description']?>"  aria-describedby="lastnameHelp" name="description" >
  </div>
       <div class="mb-3">
    <label for="speciality" class="form-label">Vacation type</label>
            <select disabled class="form-control" id="vt_id" name="vt_id">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                <option value="<?php echo $r['vt_id'] ?>"><?php echo $r['name']; ?></option>
                <?php }?>
            </select>
  </div>
 <div class="mb-3">
    <label for="answer" class="form-label">answer</label>
    <textarea type="text" class="form-control" id="answer" value="<?php echo $result['answer']?>"  aria-describedby="lastnameHelp" name="answer" >
</textarea>
  </div>

  <button type="submit" name="submitVacationUpdate" class="btn btn-success btn-block">Save Changes</button>
            <a href="admin_home.php" class="btn btn-primary">Back to List</a>

</form>
</div>
<?php }?>
<br>
