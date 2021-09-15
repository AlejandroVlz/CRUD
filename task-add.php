<?php

include('database2.php');

if(isset($_POST['name']))  {
    $name = $_POST['name'];
    $presentation = $_POST['presentation'];
    $description = $_POST['description'];
    $tipo = $_POST['tipo'];
    $stock = $_POST['stock'];
    $zona = $_POST['zona'];
    $procedencia = $_POST['procedencia'];
    
    $query = "INSERT into tabla (name, presentation, description, tipo, stock, zona, procedencia) VALUES ('$name', '$presentation', '$description', '$tipo', '$stock', '$zona', '$procedencia')";
    $result = mysqli_query($connection, $query);
    if(!$result) {
      die('Query Failed. ');
    }
    echo 'task added successfuly';
}

?>