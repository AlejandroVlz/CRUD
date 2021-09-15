<?php


     include('database2.php');
     
     $Id = $_POST['Id'];
     $name= $_POST['name'];
     $presentation= $_POST['presentation'];
     $description= $_POST['description'];
     $tipo = $_POST['tipo'];
     $stock = $_POST['stock'];
     $zona = $_POST['zona'];
     $procedencia = $_POST['procedencia'];
     
     
     $query = "UPDATE tabla SET name = '$name', presentation = '$presentation', description = '$description', tipo = '$tipo', stock = '$stock', zona = '$zona', procedencia = '$procedencia'  WHERE 
     Id = '$Id'";
     $result = mysqli_query($connection, $query);
     if(!$result){
          die('Query field');
     }

     echo "Update Task Successfully";
     

?>