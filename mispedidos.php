<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-app.js"></script>
    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-analytics.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-database.js"></script>

    <script src="./login-functions.js"></script>
    <script src="./home-functions.js"></script>

    <link rel="stylesheet" href="styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
    rel="stylesheet">    <!--otra vez-->
    <link href="css/quick-view.css" rel="stylesheet" type="text/css">
    
    <!--otra vez-->


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Inicio</title>
  </head>
  <body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #30336b;"> 
      <div class="container-fluid">
        <!-- Just an image -->
        <nav class="navbar navbar-light bg-bg-primary mb-2">
          <div class="container">
            <a class="navbar-brand" href="#">
              <img src="https://worldvectorlogo.com/static/img/logo.svg" alt="" width="200" height="24">
            </a>
          </div>
        </nav>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="misPedidos()">Mis pedidos</a>
            </li>
            <li class="nav-item">
              <a onclick="getData()" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Mi Perfil</a>
            </li>
            
          </ul>
          <button onclick="logout()" class="btn-outline cerrar-sesion">Cerrar Sesion</button>
        </div>
      </div>
    </nav>
     
    
<div class="container" style="margin-top: 30px;">
        <div class="row">
            <h1>Lista de pedidos</h1>
        </div>
    </div>
    <div class="row">
    <div class="row p-3 justify-content-center" style="float: none; margin: 0 auto;">

        <table class="table table-striped table-bordered" style="width:100%;">
            <thead>
            <tr>
                <th style="text-align: center">Id</th>
                <th style="text-align: center">Fecha</th>
                <th style="text-align: center">Articulos</th>
                <th style="text-align: center">Entregar a</th>
                <th style="text-align: center">Total</th>
                <th style="text-align: center">Tipo de pago</th>
                <th style="text-align: center">Estado</th>

            </tr>
            </thead>
      
        <tbody>
        <?php
            include 'conexion2.php';
            $uid = $_GET['uid'];
            $pdo = Database::connect();
            
            $sql = 'SELECT * FROM ventas  WHERE idUsuario="'.$uid.'"';
                foreach ($pdo->query($sql) as $row){
                    echo '<tr style="text-align: center">';
                    echo '<td>'. $row['idVenta'] .'</td>';
                    echo '<td>'. $row['fecha'] .'</td>';
                    echo '<td>'. getVentaDetalle($row['idVenta'],$pdo) .'</td>';
                    echo '<td>'. $row['direccion'] .'</td>';
                    echo '<td>$'. $row['total'] .'</td>';
                    echo '<td> '. $row['tipoPago'] .'</td>';
                    echo '<td>'. $row['estado'] .'</td>';
                }
                Database::disconnect();

                 function getVentaDetalle($idVentas,$pdo){
                    $resulted="";
                    $sql = 'SELECT * FROM venta_detalle  WHERE idVenta="'.$idVentas.'"';
                    foreach ($pdo->query($sql) as $row){
                        $resulted=''.$resulted.''.$row['articulo'].': '.$row['descripcion'].'<br>';
                    }
                    return $resulted;
                }
        ?>
    </tbody>
    </table>
              </div>
    </div>
    </div>
    <!--de aqui para aca-->
    <!-- This is where we append our handlebars template -->
    <div style="margin-top:170px"class="modal-footer">
            <button onclick="print();" type="button" class="btn btn-dark"  style="width: 100%;"  data-bs-toggle="modal" data-bs-target="#eliminarModal">Guardar registro de pedidos</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="scripts/handlebars-v4.0.5.js"></script>
    <script src="scripts/quick-view.js"></script>
    <script src="scripts/item-data.js"></script>

    
    <!--de aqui para aca-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>