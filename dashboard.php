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
              <a class="nav-link active" aria-current="page" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="misPedidos()" >Mis pedidos</a>
            </li>
            <li class="nav-item">
              <a onclick="getData()" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Mi Perfil</a>
            </li>
            
          </ul>
          <button onclick="logout()" class="btn-outline cerrar-sesion">Cerrar Sesion</button>
        </div>
      </div>
    </nav>
     <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mi Perfil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="card-profile">
                <img class="img-profile" src="https://i.stack.imgur.com/l60Hf.png" alt="John" style="width:100%">
                <h1 class="name-user" id="nombre-modal"></h1>
                <p class="title" id="numero-modal"> </p>
                <p id="direccion-modal"> </p>
                <p id="colonia-modal"> </p>
                </div>
          </div>
          <div class="modal-footer">
            <button  data-bs-target="#modal3" data-bs-toggle="modal" data-bs-dismiss="modal" type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 48%;">Eliminar mi cuenta</button>
            <button onclick="fillData()" data-bs-target="#modal2" data-bs-toggle="modal" data-bs-dismiss="modal" style="width: 48%;" type="button" class="btn btn-primary">Editar Datos</button>
          </div>
        </div>
      </div>
    </div>
     <!-- Modal actualizar datos -->
    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="mb-3">
              <div class="mb-4">
                <label for="name-change" class="form-label font-weight-bold">Nombre</label>
                <input type="text" class="form-control border-0" style="background-color:  #dfe6e9" id="name-change" aria-describedby="nameChange">
              </div>
              <div class="mb-4">
                <label for="phone-change" class="form-label font-weight-bold">Telefono</label>
                <input type="phone" class="form-control border-0" style="background-color:  #dfe6e9" id="phone-change" aria-describedby="phoneChange">
              </div>
              <div class="mb-4">
                <label for="adress-change" class="form-label font-weight-bold">Calle y numero</label>
                <input type="text" class="form-control border-0" style="background-color:  #dfe6e9;" id="adress-change" aria-describedby="adressChange">
              </div>
              <div class="mb-4">
                <label for="colonia-change" class="form-label font-weight-bold">Colonia</label>
                <input type="text" class="form-control border-0" style="background-color:  #dfe6e9;" id="colonia-change" aria-describedby="coloniaChange">
              </div>
            
            </form>
          </div>
          <div class="modal-footer">
            <button onclick="updateData()" data-bs-target="#modal2" data-bs-toggle="modal" data-bs-dismiss="modal" style="width: 100%;" type="button" class="btn btn-primary">Listo!</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal eliminar cuenta -->
    <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar mi cuenta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Estas seguro?, No podras volver a recuperar tus datos una vez elimines tu cuenta.
          </div>
          <div class="modal-footer">
            <button  type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 48%;">Cancelar</button>
            <button onclick="deleteUser()" style="width: 48%;" type="button" class="btn btn-primary">Si, eliminar</button>          </div>
        </div>
      </div>
    </div>
    

    <!-- Modal carrito -->
    <div class="modal fade" id="modalcart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- card item-->
            <div style="background-color: white !important;" class="container bg-light" id="containerCart">

            </div>
          </div>
          <div class="modal-footer">
            <button  type="button" class="btn btn-warning" data-bs-dismiss="modal" style="width: 48%;">Seguir comprando</button>
            <button onclick="goToPay()" id= "pay" style="width: 48%;" type="button" class="btn btn-dark"></button>          </div>
        </div>
      </div>
    </div>
<!-- Carousel-->
<div>
      <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img onclick="window.location.replace('/imagenesSVG.html');" src="banner3.png">
            </div>
            <div class="carousel-item">
              <img src="banner1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="banner2.png" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>
    </div>
    <!-- Menu -->
    <h1 class="mt-3 text-center mb-0">Menu de la tienda</h1>
    <div class="row p-3 justify-content-center" style="float: none; margin: 0 auto;">
     
      <!--De aqui a TARJETA de crean las cartas que contiene las tarjetas de las pizzas-->
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
              $dd = (int)$id;
              $imagen = "image1.png";
              //echo $imagen;
              echo '<div class="card p-2" style="width: 18rem; margin-right: 20px; margin-bottom: 10px;">';
                    echo '<img src="'.$imagen.'" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                          echo '<h5 class="card-title">'.$nombre.'</h5>';
                          echo '<p class="card-text">'.$descripcion.'</p><br/>';
                          //echo '<a  style="padding-top: 12px;" href="#" class="btn btn-primary w-100 mt-3">Añadir al carrito $50.00</a>';
                          echo '<button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#QuickViewModal" data-bs-whatever="'.$id.'">Comprar</button>';
                    echo '</div>';
              echo '</div>';
              }
            }
      ?>
      <!--TARJETA-->
    </div>

    <h1 class="mt-3 text-center mb-0">Bebidas</h1>
    <div class="row p-3 justify-content-center" style="float: none; margin: 0 auto;">
      <!--De aqui a TARJETA de crean las cartas que contiene las tarjetas de las pizzas-->
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
              //echo "Precio: ".$precio."<br><br>";
              $dd = (int)$id;
              $imagen = "image3.jpg";
              //echo $imagen;
              echo '<div class="card p-2" style="width: 18rem; margin-right: 20px; margin-bottom: 10px;">';
                    echo '<img src="'.$imagen.'" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                          echo '<h5 class="card-title">'.$nombre.'</h5>';
                          echo '<p class="card-text">$'.$precio.'</p><br/>';
                          echo '<button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#BebidasModal" data-bs-whatever="'.$id.'">Comprar</button>';
                    echo '</div>';
              echo '</div>';
              }
            }
      ?>
      <!--TARJETA-->
    </div>

    <!--De aqui para aca
    modal-sm
    -->
    <div class="modal fade" id="QuickViewModal" tabindex="-1" aria-labelledby="QuickViewModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="QuickViewModalLabel">a</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <!--Este debera de ir oculto-->
            <div class="row">
              <div class="col">
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="image1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="image2.png" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
              <div class="col">
                <h2 id="nombre-pizza"></h2>
                <div class="mb-3">
                  <label for="desc" style="font-size: 26px;"  class="col-form-label fw-bold">Tamaños y precios:</label>
                  <p type="text" id="desc" style="width:100%; margin-top: 15px;"><b>Pizza Mini:</b> 18 cm y 4 rebenadas de exquisito sabor $40</p>
                  <p type="text"  style="width:100%; margin-top: 15px;"><b>Pizza Grande:</b> 22 cm y 4 rebenadas de exquisito sabor $50</p>

                </div>
                <div style="width: 100%; ">
                    <div class="row">
                      <div class="col">
                      <label for="minis" class="fw-bold">Minis:</label>
                          <input type="number" id="mini-quantity" style="width:100px" name="minis" value="0" min="0" max="100">
                      </div>
                      <div class="col">
                      <label for="grandes" class="fw-bold">Grandes:</label>
                          <input type="number" id="big-quantity" style="width:100px" name="grandes" value="0" min="0" max="100">
                      </div>
                    </div>
                    <div style="margin-top: 27%;">
                    <button  data-bs-dismiss="modal" id="addCart"style="width: 100%;"class="btn btn-warning mt-2">Añadir al carrito</button>
                    </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
 <!--modal BEBIDAS-->
 <div class="modal fade" id="BebidasModal" tabindex="-1" aria-labelledby="BebidasModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="BebidasModalLabel">a</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div class="row">
                <div class="col" id="imagenDos"></div>
                <div class="col">
                <form method="post" action="#" autocomplete="off">
                <!--Este debera de ir oculto-->
                <input type="hidden" class="form-control m-2" id="id" style="width:auto;" readonly>
                <div class="mb-3">
                    <label for="desc" style="font-size: 23px;"  class="col-form-label fw-bold">Refrescate con nuestras bebidas:</label>
                  </div>
                <div style="width: 350px; margin-left: auto; margin-right: auto;">
                    <table style="width:100%;">
                    <tr>
                      <td style="text-align:center;">
                          <label for="bebidas" class="fw-bold">Elige la cantidad: </label>
                          <input type="number" id="bebidas-quantity"name="bebidas" value="0" min="0" max="100">
                      </td>
                    </tr>
                    <tr style="text-align: center; padding=150px;">
                    <button  data-bs-dismiss="modal" id="addBebidaCart"style="width: 100%;"class="btn btn-warning mt-2">Añadir al carrito</button>
                    </tr>
                </table>
                </div>
                </div>
                
            </form>
          </div>
          </div>
          <div class="modal-footer">
          </div>
          </div>
        </div>
      </div>
    </div>
    <script>

        var exampleModal = document.getElementById('QuickViewModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
          document.getElementById("mini-quantity").value=0;
          document.getElementById("big-quantity").value=0;

        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever').trim()
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')
        var variableJS =recipient;
        var description;
        //Hacer una funcion ajax que llame a un backend php que devuelva el nombre de la pizza
        function create () {
          $.ajax({
            url:"buscar.php?id="+recipient,    //the page containing php script
            type: "GET",    //request type,
            async: true,
            success:function(result){
              modalTitle.textContent ="Pizza " + result;
              description = ("Pizza " + result).trim();
              //console.log(description);
              //console.log(result);
              //console.log(recipient);
            }
        });
        }
        var element = document.getElementById("addCart");
        element.onclick = function(event) {
        var quantityMinis =  document.getElementById("mini-quantity").value;
        var quantityBigs =  document.getElementById("big-quantity").value;
        if(quantityBigs == 0 && quantityMinis==0){
          alert("Añade al menos 1 pizza");
        }else{
          addToCart(recipient,description,quantityMinis,quantityBigs);
          alert("Añadido al carrito");
        }
        
        }
        //modalBodyInput.value = recipient
        create();
      })
      //script para bebidas
      
      var tomarModal = document.getElementById('BebidasModal')
        tomarModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        var modalTitle = tomarModal.querySelector('.modal-title')
        var modalBodyInput = tomarModal.querySelector('.modal-body input')
        var identificador = recipient;
        var id = recipient.toString();
        const ac = id.trim();
        //alert("image"+ac+".png");
        const img ="image"+ac+".png";
        //alert('hola'+img+'aa');
        document.getElementById('imagenDos').innerHTML='<img src="image3.jpg" style="width:365px;"/>';
        //modalTitle.textContent = 'Agregar al carrito:  ' + recipient
        //modalBodyInput.value = recipient
        document.getElementById('id').value =recipient
        //document.getElementById('desc').value =recipient
        var price;
        var nameBebida;
           function create () {
            $.ajax({
            url:"buscarBebida.php?id="+identificador,    //the page containing php script
            type: "GET",    //request type,
            async: true,
            success:function(result){
              var resultados = result.split(":");
              modalTitle.textContent ="Bebida: " + resultados[0];
              nameBebida = resultados[0];
              price = resultados[1];
            }
        });
        }
        var element3 = document.getElementById("addBebidaCart");
        element3.onclick = function(event) {
        var bebidasCantidad =  document.getElementById("bebidas-quantity").value;
        if(bebidasCantidad == 0 ){
          alert("Añade al menos 1 bebida");
        }else{
          addToCartBebida(nameBebida,bebidasCantidad,price);
          alert("Añadido al carrito");
        }
        
        }
        create();
      })
    </script>
    

    <!--Fin Menu-->
    

    <!--de aqui para aca-->
    <!-- This is where we append our handlebars template -->

  <!-- Background Overlay for popup -->
  



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="scripts/handlebars-v4.0.5.js"></script>
    <script src="scripts/quick-view.js"></script>
    <script src="scripts/item-data.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        quickView.go();
      });
    </script>
    <!-- Boton carrito-->
    <button  onclick="listCart()" data-bs-toggle="modal" data-bs-target="#modalcart" class="material-icons floating-btn">shopping_cart</button>
    <!--Footer-->
    <div class="footer-dark">
      <footer>
          <div class="container">
              <div class="row">
                  <div class="col-sm-6 col-md-3 item">
                      <h3>Contactanos</h3>
                      <ul>
                      <li><a href="https://wa.me/527475291059">Chat</a></li>
                          <li><a href="mailto:krhono62@gmail.com">Email</a></li>
                          <li><p>Telefono: 747 529 1059</p></li>
                      </ul>
                  </div>
                  <div class="col-sm-6 col-md-3 item">
                      <h3>Acerca de</h3>
                      <ul>
                          <li><a target="_blank" href="https://www.google.com/maps/place/Av.+Vicente+Guerrero+8L,+Salubridad,+39096+Chilpancingo+de+los+Bravo,+Gro./@18.0763033,-99.6069984,8z/data=!4m16!1m10!4m9!1m4!2m2!1d-98.8252502!2d20.0977604!4e1!1m3!2m2!1d-99.4862531!2d17.5230483!3m4!1s0x85cbeb91ce302bf9:0x4ae9b8221ad13587!8m2!3d17.5231772!4d-99.4862188">Ubicacion</a></li>
                          <li><a href="#">Promociones</a></li>
                          <li><a href="#">Politica de privacidad</a></li>
                      </ul>
                  </div>
                  <div class="col-md-6 item text">
                      <h3>Datos del negocio</h3>
                      <p>¡Pequeñas en tamaño, grandes en sabor! Las auténticas de CBTIS 134.
                        Contamos con servicio a domicilio domicilio, checa nuestras dinámicas de compras.</p>
                  </div>
                  <hr>

                  <div class="col item social"><a target="_blank" href="https://www.facebook.com/donpizzachilpancingo"><img class="icon-fb" src="https://i.pinimg.com/originals/9e/b3/84/9eb384eb1d9d09e82bcef6852d38085c.png"></a></div>
              </div>
          </div>
      </footer>
  </div>
    <!--de aqui para aca-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>