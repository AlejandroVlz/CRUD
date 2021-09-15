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
                            <td>Presentación</td>
                            <td>Descripción</td>
                            <td>Jugeute para</td>
                            <td>stock</td>
                            <td>Zona de alamcén</td>
                            <td>Procedencia</td>
                            

                        </tr>
                    </thead>
                    <tbody id="tasks"></tbody>
                </table>
            </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="appp.js"></script>
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>


</html>