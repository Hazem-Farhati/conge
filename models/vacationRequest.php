<?php 

class _vacation{

    private $db;
    //constructor to initialize private to the database connection
    function __construct($conn)
    {
        $this->db=$conn;
    }
       
    //function to insert a new record into the attendee database
    public function insertVacation($user_id,$vt_id,$description,$first_date,$last_date){
     
        try {
    // define sql statement to be executed
    $sql="INSERT INTO vacation_request (user_id,vt_id,description,first_date,last_date) VALUES(:user_id,:vt_id,:description,:first_date,:last_date)";
    //prepare the sql statement to be executuin
    $stmt=$this->db->prepare($sql);
//bin all placeholders to the actual values
    $stmt->bindparam(':user_id',$user_id);
    $stmt->bindparam(':description',$description);
    $stmt->bindparam(':first_date',$first_date);
    $stmt->bindparam(':last_date',$last_date);
    $stmt->bindparam(':vt_id',$vt_id);
  

//execute statment
    $stmt->execute();
    return true;
} catch (PDOException $e) {
echo $e->getMessage();
return false;
}
    }

 public function getVacation(){
    try{
        $sql="SELECT * FROM `vacation_request` ";
        $results=$this->db->query($sql);
        return $results;
    }catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}

 }

        public function getVacationType(){
          $sql = "SELECT * FROM `vacation_type` ";
        $result = $this->db->query($sql);
        return $result;
    }

       public function getVacationDetails($id){
        $sql="SELECT * FROM `vacation_request` vr inner join vacation_type vt on vr.vt_id = vt.vt_id where vacation_id = :id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        $result=$stmt->fetch();
        return $result;
 }
     public function getVacations(){
        try {
              $sql = "SELECT * FROM `vacation_request` vr  inner join vacation_type vt on vr.vt_id = vt.vt_id ";
        $result = $this->db->query($sql);
        return $result;
        }
      catch (PDOExeption $e) {
    //throw $th;
    echo $e->getMessage();
    return false;
}
}
  public function deleteVacation($id){
        try {
                $sql = "DELETE from vacation_request where vacation_id = :id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        return true;
        } catch (PDOExeption $e) {
             echo $e->getMessage();
    return false;
        }
    }

    public function updateVacation($id,$description,$first_date,$last_date,$vt_id,$answer){
        try {
                $sql = "UPDATE `vacation_request` SET `description`=:description,`first_date`=
       :first_date,`last_date`=:last_date,`vt_id`=:vt_id,`answer`=:answer WHERE vacation_id = :id" ;
         $stmt = $this->db->prepare($sql);
  $stmt ->bindparam(':id',$id);
  $stmt ->bindparam(':description',$description);
  $stmt ->bindparam(':first_date',$first_date);
  $stmt ->bindparam(':last_date',$last_date);
  $stmt ->bindparam(':vt_id',$vt_id);
  $stmt ->bindparam(':answer',$answer);
  $stmt->execute();
  return true;
        } catch (PDOExeption $e) {
           //throw $th;
    echo $e->getMessage();
    return false;
        }
  
    }
 }
?>