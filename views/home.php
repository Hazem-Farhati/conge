
    <?php
    $title = 'Index'; 
include_once '../views/includes/session.php';

    require_once '../views/includes/header.php'; 
    require_once '../db/config.php'; 
    require_once '../controller/vacationRequest_controller.php';
    require_once '../controller/user_controller.php';

$results= $vacation->getVacationType();
insert_vacation($vacation);

?>

<form class="container " method="post" action="vacation_view.php" enctype="multipart/form-data">
  <!-- Name input 

  
-->  
     <div class="form-group">
            <label for="vt_id">Select type</label>
            <select class="form-control" id="vt_id" name="vt_id">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                <option value="<?php echo $r['vt_id'] ?>"><?php echo $r['name']; ?></option>
                <?php }?>
            </select>
        </div>

 <div class="mb-3">
    <label for="sd" class="form-label text-success">starting date</label>
    <input name="first_date" type="text" class="form-control " id="sd" value="mm/dd/yyyy"    >
 <?php $_SESSION['email'] ?>

  </div>

    <div class="mb-3">
    <label for="ed" class="form-label text-danger">Ending date</label>
    <input type="text" class="form-control" id="ed" value="mm/dd/yyyy"  name="last_date" >
  </div>
  <!-- Message input -->
  <div class="form-outline mb-4">
        <label class="form-label" for="form4Example3">Description</label>
    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
  </div>


  <!-- Submit button -->
  <button  onclick="return confirm('Are you sure you want to submit?');" type="submit" name="submitVacation" class="btn btn-primary btn-block mb-4">Submit</button>
</form>


    <?php require_once 'includes/footer.php'; ?>

