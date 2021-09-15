<?php
    include('database2.php');

    $search = $_POST['search'];

    if(!empty($search)){
        $query = "SELECT *FROM tabla WHERE name LIKE '$search%'";
        $result = mysqli_query($connection, $query);
        if (!$result){
             die(' Query Error'. mysqli_error($connection));

        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array (
                'name' => $row['name'],
                'presentation' => $row['presentation'],
                'description' => $row['description'],
                'tipo' => $row['tipo'],
                'stock' => $row['stock'],
                'zona' => $row['zona'],
                'procedencia' => $row['procedencia'],
                'Id' => $row['Id']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

?>