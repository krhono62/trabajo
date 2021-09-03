<?php
    $ordStatus = $_GET['status'];
    $querys = $_GET['querys'];
    $transactionID = $_GET['transactionID'];
    $paidAmount = $_GET['total'];
    $paidCurrency = "MXN";
    $itemName = "Items Varios";
    $pdo = null;
    $errorMsg = "";

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'id17105767_root';
    $DATABASE_PASS = '(cBu3BoPI3|W{KE#';
    $DATABASE_NAME = 'id17105767_donpizza';
    try {
        $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {        
    }

    if($ordStatus == 'success'){
        //$querysList = split("\;", $querys);
        $queryLastID= "SELECT MAX(idVenta) AS id FROM ventas";
        $idLastVenta = $pdo->query($queryLastID)->fetchColumn();
        $queryList = str_replace("?",($idLastVenta+1),$querys);
        $queryList = explode('+', $queryList);
        $numeroQuerys = count($queryList);
        for($i=0; $i<$numeroQuerys;$i++){            
            $nuevoQuery = $queryList[$i];
            //printf($nuevoQuery);            
            $stmt = $pdo->prepare($nuevoQuery);
            $stmt->execute();            
        }
    }
$resulted;
?>  
<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="./checkout-controllers.js"></script>

<body class="back">
<div class="container-payment">
    <div class="status-payment">
        <?php if(strpos($ordStatus, 'success') !== false){?>
        <script>
        //var carrito = getCarrito();
        //console.log(carrito);
        //window.location.replace('/insertarBDD.php');
        //getQuerys();
        </script>
            
            <script>                
                sessionStorage.setItem("items", null);
            </script>
            <div class="col d-flex justify-content-center">
            </div>
                <div class="card" style="width: 40%; margin: 0 auto;float: none; margin-top:50px; border-color: green; border-style:solid;">
                <div class="card-body">
                    <div class="modal-header">
                        <h5 style="font-weight:bold;" class="modal-title" id="exampleModalLabel">Ya esta todo listo!</h5>
                    </div>
                    <p style="margin-left: 20px;">Tu orden ha sido recibida y sera preparada cuanto antes, a continuacion te mostramos los datos de tu pedido:</p>
                <div style="margin-left: 20px;">
                    <h4>Informacion del pago</h4>
                    <p><b>ID de la transaccion:</b> <?php echo $transactionID; ?></p>
                    <p><b>Total Pagado:</b> <?php echo $paidAmount.' '.$paidCurrency; ?></p>                    
                    <h4>Informacion del producto</h4>
                    <p><b>Nombre:</b> <?php echo $itemName; ?></p>
                </div>
                    <div class="modal-footer">
                        <button  onclick="redirectToCart()" type="button" class="btn btn-primary"  style="width: 100%;">Volver al inicio</button>
                    </div>
                </div>
                </div>
            
            </div>
        <?php }else{ ?>
            <div class="col d-flex justify-content-center">
            </div>
                <div class="card" style="width: 40%; margin: 0 auto;float: none; margin-top:50px; border-color: red; border-style:solid;">
                <div class="card-body">
                    <div class="modal-header">
                        <h5 style="font-weight:bold;"class="modal-title" id="exampleModalLabel"><?php echo $errorMsg; ?></h5>
                    </div>
                    <p style="margin-left: 20px; ">No te preocupes, puedes volver a intentar pagar con otra tarjeta o elegir el metodo de pago en efectivo
                , te recomendamos verificar los siguientes puntos:</p>
                <div style="margin-left: 20px;">
                    <ul>
                    <li style="color: red;" type="disc">Verifica que tu tarjeta tenga fondos suficientes.</li>
                    <li style="color: red;" type="disc">Verifica que tu tarjeta este activa.</li>
                    <li style="color: red;" type="disc">Asegurate de escribir correctamente el codigo de seguridad.</li>
                    <li style="color: red;" type="disc">Contacta a tu banco para que te informe mas acerca de la razon del rechazo.</li>

                    </u1>
                </div>
                    <div class="modal-footer">
                        <button  onclick="redirectToCart()" type="button" class="btn btn-danger" style="width: 47%;">Salir</button>
                        <button  onclick="redirectToCheckout()" type="button" class="btn btn-primary"  style="width: 47%;">Reintentar el pago</button>
                    </div>
                </div>
                </div>
            
            </div>
        <?php } ?>
    </div>
</div>
</body>