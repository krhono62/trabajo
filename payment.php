
<html>
<head>
<script type="text/javascript">
   function showMessage(result, tID){
       console.log("Entro: "+result);
       var cart = JSON.parse(sessionStorage.getItem("items"));
       console.log("Carrito: "+cart);
       var queryInsert = "";
       var subTotal = 0;
       console.log("Items Carrito: "+cart.length);
       for(var indice=0; indice<cart.length; indice++){
           console.log("Indice "+indice);
           var uid = cart[indice].UID;
           var articulo = cart[indice].descripcion;
           var descripcion="";
           if(cart[indice].tipo=="bebida"){
               descripcion = cart[indice].grande;
            }else{
                descripcion = "Minis: "+cart[indice].mini+", Grandes: "+cart[indice].grande;
            }           
           var total = cart[indice].total;
           subTotal += total;
           var tipoPago = "Tarjeta";
           var estado = "En Curso";
           //var direccion = getDireccion();
           var direccion = sessionStorage.getItem("direccion");
           queryInsert = queryInsert + "INSERT INTO venta_detalle(idVenta,articulo,descripcion) values ("+"?"+",'"+articulo+"','"+descripcion+"');+";
           if((indice+1)>=cart.length){
            queryInsert = "INSERT INTO ventas(idUsuario,fecha,total,tipoPago,estado,direccion) values ("+"'"+uid+"',"+"NOW()"+","+subTotal+",'"+tipoPago+"','"+estado+"',\""+direccion+"\");+"+queryInsert;
           }
        }
       console.log(cart);
       if(result=='success'){
        window.location.replace('/insertarBDD.php?status='+result+'&querys='+queryInsert+'&transactionID='+tID+'&total='+subTotal);
       }else{
        window.location.replace('/insertarBDD.php?status='+result+'&querys='+queryInsert+'&transactionID='+tID+'&total='+subTotal);
       }
   }
   </script>
</head>
<body>
<?php 
// Include configuration file  
require_once 'config.php';
require 'conexion.php';

 
$payment_id = $statusMsg = ''; 
$ordStatus = 'error'; 
$errorMsg="";
$numeroItems = "";
$queryInsert = "";

// Check whether stripe token is not empty 
if(!empty($_POST['stripeToken'])){ 
     
    // Retrieve stripe token, card and user info from the submitted form data 
    $token  = $_POST['stripeToken']; 
    //$name = $_POST['name']; 
    //$email = $_POST['email']; 
    // Include Stripe PHP library 
    require_once 'vendor/stripe/stripe-php/init.php'; 
     
    // Set API key 
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
     
	try { 
		// Create a Customer:
$customer = \Stripe\Customer::create([
    'source' => $token,
    'email' => 'krhono62@hmail.com',
]);

// Charge the Customer instead of the card:
$charge = \Stripe\Charge::create([
    'amount' => 1000,
    'currency' => 'usd',
    'customer' => $customer->id,
]);

$chargeJson = $charge->jsonSerialize(); 
// Transaction details  
$transactionID = $chargeJson['balance_transaction']; 
$paidAmount = $chargeJson['amount']; 
$paidAmount = ($paidAmount/100); 
$paidCurrency = $chargeJson['currency']; 
$payment_status = $chargeJson['status']; 
 // If the order is successful 

 if($payment_status == 'succeeded'){ 
    $ordStatus = 'success'; 
    $statusMsg = 'Your Payment has been Successful!'; 
    echo '<script> showMessage(\'' . $ordStatus . '\',\'' . $transactionID . '\'); </script>';
}else{ 
    $statusMsg = "Your Payment has Failed!";
} 
 
// YOUR CODE: Save the customer ID and other info in a database for later.

// When it's time to charge the customer again, retrieve the customer ID.

	}catch(Exception $e) { 
		$api_error = $e->getMessage(); 
		$errorMsg =  $api_error;
        echo '<script> showMessage(\'' . $errorMsg . '\'); </script>'; 

    }
	
}	

?>

</body>
</html>
