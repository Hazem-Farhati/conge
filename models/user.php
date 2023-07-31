<?php 
class _user{
    private $db;
    //constructor to initialize private to the database connection
    function __construct($conn)
    {
        $this->db=$conn;
    }
    public function InsertUser($firstname,$lastname,$email,$password,$dob,$user_type){
        try {
            $result=$this->getUserByEmail($email);
            if($result['num']>0){
                return false;
            }
            else{
                $new_password=md5($password.$email);
    // define sql statement to be executed
    $sql='INSERT INTO user (firstname,lastname,email,password,dob,user_type) VALUES(:fname,:lname,:email,:password,:dob,:user_type)';
    //prepare the sql statement to be executuin
    $stmt=$this->db->prepare($sql);
//bin all placeholders to the actual values
    $stmt->bindparam(':fname',$firstname);
    $stmt->bindparam(':lname',$lastname);
    $stmt->bindparam(':email',$email);
    $stmt->bindparam(':password',$new_password);
    $stmt->bindparam(':dob',$dob);
    $stmt->bindparam(':user_type',$user_type);



 
//execute statment
    $stmt->execute();
    return true;
            }
        
        } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
        }
    }

    //login
    
    public function getUser($email,$password){
        try{
            $sql="SELECT * FROM user where email=:email and password=:password";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':password',$password);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUserByEmail($email){
        try{
            $sql="SELECT count(*) as num FROM user where email= :email";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':email',$email);

            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

     public function getUsers(){
        try {
              $sql = "SELECT * FROM `user` ";
        $result = $this->db->query($sql);
        return $result;
        }
      catch (PDOExeption $e) {
    //throw $th;
    echo $e->getMessage();
    return false;
}
}
       public function getUserDetails($id){
        $sql="SELECT * FROM `user` where user_id = :id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        $result=$stmt->fetch();
        return $result;
 }
  public function deleteUser($id){
        try {
        $sql = "DELETE from user where user_id = :id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        return true;
        } catch (PDOExeption $e) {
             echo $e->getMessage();
    return false;
        }
    }

       public function updateUser($id,$firstname,$lastname,$email,$password,$dob,$user_type){
        try {
                $sql = "UPDATE `user` SET `firstname`=:firstname,`lastname`=
       :lastname,`email`=:email,`password`=:password,`dob`=:dob ,`user_type`=:user_type   WHERE user_id = :id" ;
         $stmt = $this->db->prepare($sql);
  $stmt ->bindparam(':id',$id);
  $stmt ->bindparam(':firstname',$firstname);
  $stmt ->bindparam(':lastname',$lastname);
  $stmt ->bindparam(':email',$email);
  $stmt ->bindparam(':password',$password);
  $stmt ->bindparam(':dob',$dob);
  $stmt ->bindparam(':user_type',$user_type);
  $stmt->execute();
  return true;
        } catch (PDOExeption $e) {
           //throw $th;
    echo $e->getMessage();
    return false;
        }
  
    }
        public function getUserByUser_id($id){
        try{
            $sql="SELECT * FROM user where user_id= :user_id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':user_id',$id);

            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


}
?>