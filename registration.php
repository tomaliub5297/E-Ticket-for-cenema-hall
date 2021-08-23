  <?php
  if (!session_id()) {
    session_start();
  }
  include_once ('db.php');

 $user=$_REQUEST['postName'];
 $pass=$_REQUEST['postPassword'];

 if ($user=="" || $pass=="") {
    echo "3";
  }{

    $usrNameUnique=true;
    $sql="select userName from user;";
    $res=$conn->query($sql);
    while ($row=$res->fetch_assoc()) {
      if ($user===$row['userName']) {
        $usrNameUnique=false;
        break;          
      }         
    }
    if (!($usrNameUnique)) {

      echo "2";
    }else{

      echo "1";
      $data=new Deliveryman();
      $var= $data->initialize($conn,$user,$pass);

    }
  }


  class Deliveryman
  {

    function initialize($conn,$user,$pass)
    {
      $sql="insert into user( userID,userName, password,status) values('',?,?,202);";

      if (($stmt=$conn->prepare($sql))
        ) {
        $stmt->bind_param("ss",$userName,$password);


    }else
    {
      var_dump($conn->error);

    }

    $userName=$user;
    $password=$pass;


    $stmt->execute();

    $stmt->close();

    
  }
}

?>