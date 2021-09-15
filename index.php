<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTARIO DE JUGUETES</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>


<?php if(!empty($user)): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">INVENTARIO DE JUGUETES</a>
     

        <ul class="navbar-nav ml-auto">
            <form class="form-inline my-2 my-lg-0">
                <input type="search" id="search" class="form-control mr-sm-2" placeholder="Busca el juguete ">
                <button class="btn btn-success my-2  my-sm-0" type="submit">
                BUSCAR
            </button>
            </form>
        </ul>
    </nav>


    <div class="container p-2">

        <button id="nuevo" type="button" class="btn btn-success my-2  my-sm-0" data-toggle="modal" data-target="#exampleModal">
         NUEVO
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                    </div>

                    <div class="modal-body">

                        <div class="col md 6">
                            <div class="card">
                                <div class="card-body">
                                    <form id="task-form">
                                        <input type="hidden" Id="taskId">
                                        <div class="form-grup">
                                            <input type="text" id="name" placeholder="Nombre del juguete" class="form-control">
                                        </div>

                                        <div class="form-grup">
                                            <input type="text" id="presentation" placeholder="Presentación" class="form-control">
                                        </div>

                                        <div class="form-grup">
                                            <textarea id="description" cols="" rows="" class="form-control" placeholder="Describe el juguete"></textarea>
                                        </div>
                                        <div class="form-grup">
                                            <select  id="tipo" class="form-control">
                                            <option value="Ambos">Ambos</option>
                                            <option value="Niño">Niño</option>
                                            <option value="Niña">Niña</option>
                                            </select>

                                        </div>
                                        <div class="form-grup">
                                            <input type="number" id="stock" placeholder="stock" class="form-control">
                                        </div>

                                        <div class="form-grup">
                                            <input type="text" id="zona" placeholder="Zona de alamcén" class="form-control">
                                        </div>
                                        <div class="form-grup">
                                            <input type="text" id="procedencia" placeholder="Procedencia" class="form-control">
                                        </div>

                                    <br>
                                    
                                        <button type="submit" class="btn btn-primary btn-block text-center">
                                            Guardar nuevo juguete
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>

                        
                    </div>
                </div>
            </div>
        </div>


        <div class="container p-4">
            <div class="row">

            </div>
            <div class="col md 7">
                <div class="card my-4 " id="task-result">
                    <div class="car body">
                        <ul id="container"></ul>
                    </div>
                </div>
                <table class="table table-bordered table-sm ">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>Nombre</td>
                            <td>Presentación/td>
                            <td>Descripción</td>
                            <td>Jugeute para</td>
                            <td>stock</td>
                            <td>Zona de alamcén</td>
                            <td>Procedencia</td>
                            <td>Editar</td>
                            <td>Eliminar</td>
                            

                        </tr>
                    </thead>
                    <tbody id="tasks"></tbody>
                </table>
            </div>
        </div>
    </div>


      <br> Bienvenid@ . <?= $user['email']; ?>
      <br>ha iniciado sesión correctamente
      <a href="logout.php">
      cerrar sesión
      </a>
    <?php else: ?>

        <?php require 'partials/header.php' ?>
        
      <h1 class="btn btn align-content-center" >POR FAVOR INGRESA O REGÍSTRATE</h1> <br><br>


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
<br>

<br>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="CORREO ELECTRÓNICO">
      <input name="password" type="password" placeholder="CONTRASEÑA">
      <input type="submit" value="INICIAR SESIÓN"  class="row  justify-content-center " >

      <div class="row  justify-content-center">
      
      <a href="tabla.php" class="btn btn-success">    VISUALIZAR INVENTARIO    </a> 
      </div> <br>
      
      
      </form>
      <img class="avatar" src="assets/img/lulu.jpg">
    
    <?php endif; ?>





    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>


</html>