 <?php
require_once "../includes/connect.php";
class Verify {
private $con;
public function __construct($con)
{
    $this->con=$con;
}
public function emailVerification($token)

{ $currentTime=date("Y-m-d H:i:s");
  $stmt=$this->con->prepare("SELECT id, email FROM verify WHERE token=? AND expiry_time>=?");
  $stmt->bind_param("ss",$token,$currentTime);
  $stmt->execute();
  $stmt->store_result();

  if($stmt->num_rows>0)
  {
    $stmt->bind_result($id,$email);
    $stmt->fetch();
 $newToken=bin2hex(random_bytes(16));
    $updateStmt=$this->con->prepare("UPDATE verify SET token=? WHERE id=?");
    $updateStmt->bind_param("si",$newToken,$id);
    if($updateStmt->execute())
    {
        header("Location: ../signup.php?email=".urlencode($email)."&id=".$id);
    }
    else{
        echo "Update failed";
    }
   
  }
  else{
    header("Location: ../test.php");
}

}

}
if(isset($_GET["token"]))
{
    $tokenToVerify=$_GET["token"];
    $object=new Verify($con);
    $object->emailVerification($tokenToVerify);
}

else{
    echo "No token provided";
}

?>