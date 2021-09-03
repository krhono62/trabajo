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
                <a class="nav-link" href="ventas.php">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Menu Tienda</a>
            </li>
            
          </ul>
          <button onclick="logout()" class="btn-outline cerrar-sesion">Cerrar Sesion</button>
        </div>
      </div>
    </nav>
    
    
    <!-- Menu -->
    <h1 class="mt-3 text-center mb-0">GESTIONAR MENU DE LA TIENDA</h1>
    
    <div class="row p-3 justify-content-center" style="float: none; margin: 0 auto;">
     
      <table class=" mt-0 table table-striped table-bordered" style=" width:900px;" >
        <thead>
          <tr>
            <th style="text-align: center">ID Pizza</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Descripcion</th>
            <th colspan="2" style="text-align: center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $mostrar=fopen('pizzas.txt','r');
                  while(!feof($mostrar))
                  {
                    $id=fgets($mostrar);
                    $nombre=fgets($mostrar);
                    $descripcion=fgets($mostrar);
                    if($id!=""){
                    //echo "Id: ".$id."<br>";
                    //echo "Nombre: ".$nombre."<br>";
                    //echo "Descripcion: ".$descripcion."<br><br>";
                    echo "<tr>";
                          echo "<td style='text-align: center'>".$id."</td>";
                          echo "<td style='text-align: center'>".$nombre."</td>";
                          echo "<td>".$descripcion."</td>";
                          echo '<td style="text-align: center"><form action="eliminarPizza.php" method="post"><input type="hidden" value="'.$id.'" name="id"><input class="btn btn-danger" type="submit" value="ELIMINAR"></form></td>';
                          echo '<td style="text-align: center"><form action="modificarPizza.php" method="post"><input type="hidden" value="'.$id.'" name="id"><input class="btn btn-success" type="submit" value="MODIFICAR"></form></td>';
                    echo "<tr>";
                    }
                  }
                
            ?>
        </tbody>
        </table>
    </div>
    <div class="row p-3 justify-content-center" style="float: none; margin: 0 auto;">
     
     <table class=" mt-0 table table-striped table-bordered" style=" width:900px;" >

       <thead>
         <tr>
           <th style="text-align: center">ID Bebidas</th>
           <th style="text-align: center">Nombre</th>
           <th style="text-align: center">Precio</th>
           <th style="text-align: center" colspan="2">Opciones</th>
         </tr>
       </thead>

       <tbody>
           <?php
               $mostrar=fopen('bebidas.txt','r');
                 while(!feof($mostrar))
                 {
                   $id=fgets($mostrar);
                   $nombre=fgets($mostrar);
                   $precio=fgets($mostrar);
                   if($id!=""){
                   //echo "Id: ".$id."<br>";
                   //echo "Nombre: ".$nombre."<br>";
                   //echo "Descripcion: ".$descripcion."<br><br>";
                   echo "<tr>";
                         echo "<td style='text-align: center'>".$id."</td>";
                         echo "<td style='text-align: center'>".$nombre."</td>";
                         echo "<td> $".$precio."</td>";
                         echo '<td style="text-align: center"><form action="eliminarBebida.php" method="post"><input type="hidden" name="control" value="bebida"><input type="hidden" value="'.$id.'" name="id"><input class="btn btn-danger" type="submit" value="ELIMINAR"></form></td>';
                         echo '<td style="text-align: center"><form action="modificarBebida.php" method="post"><input type="hidden" name="control" value="bebida"><input type="hidden" value="'.$id.'" name="id"><input class="btn btn-success" type="submit" value="MODIFICAR"></form></td>';
                   echo "<tr>";
                   }
                 }
               
           ?>
       </tbody>
       </table>
   </div>
    <div style="margin-top:70px"class="modal-footer">
            <button  type="button" class="btn btn-warning"  style="width: 48%;" data-bs-toggle="modal" data-bs-target="#exampleModal">Insertar nuevo producto</button>
            <button  type="button" class="btn btn-dark"  style="width: 48%;"  data-bs-toggle="modal" data-bs-target="#exampleModal2">Eliminar un producto</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Insertar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           Por favor selecciona que deseas insertar.
          </div>
          <div class="modal-footer">
            <button  data-bs-target="#InsertarModal" data-bs-toggle="modal" data-bs-dismiss="modal" type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 48%;">Pizzas</button>
            <button data-bs-target="#InsertarBModal" data-bs-toggle="modal" data-bs-dismiss="modal" style="width: 48%;" type="button" class="btn btn-primary">Bebidas</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Eliminar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           Por favor selecciona que deseas eliminar.
          </div>
          <div class="modal-footer">
            <button  data-bs-target="#eliminarModal" data-bs-toggle="modal" data-bs-dismiss="modal" type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 48%;">Pizzas</button>
            <button data-bs-target="#eliminarBModal" data-bs-toggle="modal" data-bs-dismiss="modal" style="width: 48%;" type="button" class="btn btn-primary">Bebidas</button>
          </div>
        </div>
      </div>
    </div>
 
        <!--insertar-->
        <!-- Modal -->
        <div class="modal fade " id="InsertarModal" tabindex="-1" aria-labelledby="InsertarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="InsertarModalLabel">Insertar Datos de la nueva Pizza</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name=f1 action="guardar.php" method="post" autocomplete="off">
                        <table style=" width:100%;">
                        <tr><TD>ID pizza</TD><td style="padding:10px;"><input type="text" name="id" required></td></tr>
                        <tr><TD>Nombre</TD><td style="padding:10px;"><input type="text" name="nombre" required></td></tr>
                        <tr><TD>Descripcion</TD><td style="padding:10px;"><textarea name="descripcion" required></textarea></td></tr>
                        <tr><td colspan="2" align="center" style="padding:10px;"><input type="submit" class="btn btn-primary" value="Guardar"></td> </tr>
                        </table>
                        </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            </div>
        </div>

        <!--eliminar-->
        <!-- Modal -->
        <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="eliminarModalLabel">Eliminar una pizza por ID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name=f1 action="eliminarPizza.php" method="post" autocomplete="off">
                        <table style=" width:100%;">
                        <tr><TD>ID pizza</TD><td style="padding:10px;"><input type="text" name="id" required></td></tr>
                        <tr><td colspan="2" align="center" style="padding:10px;"><input type="submit" class="btn btn-primary" value="ELIMINAR"></td> </tr>
                        </table>
                        </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            </div>
        </div>

           <!--insertar bebida-->
        <!-- Modal -->
        <div class="modal fade " id="InsertarBModal" tabindex="-1" aria-labelledby="InsertarBModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="InsertarBModalLabel">Insertar Datos de la nueva bebida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name=f1 action="guardarBebida.php" method="post" autocomplete="off">
                        <table style=" width:100%;">
                        <!--Este es para saber que estamos enviando al guardaar, una bebida-->
                        <tr><td><input type="hidden" name="control" value="bebida"></td></tr>
                        <tr><TD>ID Bebida</TD><td style="padding:10px;"><input type="text" name="id" required></td></tr>
                        <tr><TD>Nombre</TD><td style="padding:10px;"><input type="text" name="nombre" required></td></tr>
                        <tr><TD>Precio</TD><td style="padding:10px;"><input type="number" id="precio" name="precio" value="0" min="0" max="100" step="0.1" required> </td></tr>
                        <tr><td colspan="2" align="center" style="padding:10px;"><input type="submit" class="btn btn-primary" value="Guardar"></td> </tr>
                        </table>
                        </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            </div>
        </div>

        <!--eliminar-->
        <!-- Modal -->
        <div class="modal fade" id="eliminarBModal" tabindex="-1" aria-labelledby="eliminarBModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="eliminarBModalLabel">Eliminar una bebida por ID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name=f1 action="eliminarBebida.php" method="post" autocomplete="off">
                        <table style=" width:100%;">
                        <tr><TD>ID Bebida</TD><td style="padding:10px;"><input type="text" name="id" required></td></tr>
                        <tr><td colspan="2" align="center" style="padding:10px;"><input type="submit" class="btn btn-primary" value="ELIMINAR"></td> </tr>
                        </table>
                        </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            </div>
        </div>
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="scripts/handlebars-v4.0.5.js"></script>
    <script src="scripts/quick-view.js"></script>
    <script src="scripts/item-data.js"></script>

    
    <!--de aqui para aca-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>