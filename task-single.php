<?php

include('database2.php');


 $Id = $_POST['Id'];
 $query = "SELECT * FROM tabla WHERE Id = $Id";
 $result = mysqli_query($connection, $query);
  if(!$result){
      die('Query failed');

  }
   
  
  $json = array();
  while($row = mysqli_fetch_array($result)){
      $json[]=array(
       'name' => $row['name'],
       'presentation' => $row['presentation'],
       'description' => $row['description'],
       'tipo' => $row['tipo'],
       'stock' => $row['stock'],
       'zona' => $row['zona'],
       'procedencia' => $row['procedencia'],
       
       'Id'=> $row['Id']
      );

      }
      $jsonstring = json_encode($json[0]);
      echo $jsonstring;


?>