<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js" integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A==" crossorigin="anonymous"></script>

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
              <a class="nav-link" href="admin-dashboard.php">Pedidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gestionarMenu.php">Menu Tienda</a>
            </li>
            
          </ul>
          <button onclick="logout()" class="btn-outline cerrar-sesion">Cerrar Sesion</button>
        </div>
      </div>
    </nav>
    
    <h1 style="text-align: center; margin-top: 40px;">Informacion graficada de tu negocio</h1>      
    <div class="row justify-content-center" style="float: none; margin: 0 auto; margin-top:100px;">
        <div class="align-self-center" style="width: 300px; height: 300px; margin-right: 20px;">
            <canvas id="barras" width="400" height="400"></canvas>
        </div>
        <div class="align-self-center" style="width: 300px; height: 300px; margin-right: 20px;">
            <canvas id="dona-ventas" width="400" height="400"></canvas>
        </div>
        <div class="align-self-center" style="width: 300px; height: 300px; margin-right: 20px;">
            <canvas id="minis" width="400" height="400"></canvas>
        </div>
        <div class="align-self-center" style="width: 300px; height: 300px;">
            <canvas id="grandes" width="400" height="400"></canvas>
        </div>
    </div>

    <script src="graficacion.js"></script>
    <?php
            include 'conexion2.php';
            $pdo = Database::connect();
            // Sentencia SQL
            $pdo = Database::connect();
            $sql = 'SELECT COUNT(*) total FROM ventas';
            $total;
            foreach ($pdo->query($sql) as $resultado){
                $total = $resultado['total'];
            }
            $sql = 'SELECT SUM(total) as total FROM ventas WHERE estado="Entregado"';
            $totalVentas;
            foreach ($pdo->query($sql) as $resultado){
                $totalVentas = $resultado['total'];
            }
            echo '<script type="text/javascript">
            generarGraficas('.$total.');</script>'; 
            echo '<script type="text/javascript">
            generarGraficasVentas('.$totalVentas.');</script>'; 
            Database::disconnect();
        ?>

<div style="margin-top:170px"class="modal-footer">
            <button onclick="print();" type="button" class="btn btn-dark"  style="width: 100%;"  data-bs-toggle="modal" data-bs-target="#eliminarModal">Guardar registro de ventas</button>
    </div>
    <!--de aqui para aca-->
    <!-- This is where we append our handlebars template -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="scripts/handlebars-v4.0.5.js"></script>
    <script src="scripts/quick-view.js"></script>
    <script src="scripts/item-data.js"></script>

    
    <!--de aqui para aca-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>