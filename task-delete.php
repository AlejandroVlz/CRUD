<?php


  include('database2.php');

  if(isset($_POST['Id'])){

    $Id =$_POST['Id'];

    $query = "DELETE FROM tabla WHERE Id = $Id";
    $result= mysqli_query($connection, $query);
    if(!$result) {
        die('Query failed');
    }
    echo "Task deleted Successfully";

  }
 
?>