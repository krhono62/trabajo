<?php
// Include configuration file 
include('config.php');
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Pagar</title>
<meta charset="utf-8">

<!-- Stylesheet file -->

<link rel="stylesheet" href="css/style.css">
<script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-app.js"></script>
<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-analytics.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-database.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="./login-functions.js"></script>
<script src="./checkout-controllers.js"></script>
<!-- Stripe JS library -->
<script src="https://js.stripe.com/v3/"></script>

</head>
<body style="background-color: #ecf0f1;">
<div class="col d-flex justify-content-center">
	
</div>
    <div class="card" style="width: 40%; margin: 0 auto;float: none; margin-top:50px;">
      <div class="card-body">
	  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del envio</h5>
        <button onclick="redirectToCart();" type="button" class="btn-close"></button>
      </div>
		<div class="mb-2">
			<label for="nombre-receptor" class="form-label font-weight-bold">Nombre de quien recibe</label>
			<input type="text" class="form-control border-0 mb-2" style="background-color:  #dfe6e9" placeholder="Ingresa tu nombre" id="nombre-receptor">
		</div>
		<div class="mb-2">
			<label for="telefono-receptor" class="form-label font-weight-bold">Telefono de contacto</label>
			<input type="phone" class="form-control border-0 mb-2" style="background-color:  #dfe6e9" placeholder="Ingresa tu telefono" id="telefono-receptor">
		</div>
		<div class="mb-2">
			<label for="calle-receptor" class="form-label font-weight-bold">Calle y numero</label>
			<input type="text" class="form-control border-0 mb-2" style="background-color:  #dfe6e9" placeholder="Ingresa calle y numero" id="calle-receptor">
		</div>
		<div class="mb-2">
			<label for="colonia-receptor" class="form-label font-weight-bold">Colonia</label>
			<input type="text" class="form-control border-0 mb-2" style="background-color:  #dfe6e9" placeholder="Ingresa tu colonia" id="colonia-receptor">
		</div>
		<div class="mb-2">
			<label for="referencias-receptor" class="form-label font-weight-bold">Referencias</label>
			<input type="text" class="form-control border-0 mb-2" style="background-color:  #dfe6e9" placeholder="Ejemplo: Fachada de la casa" id="referencias-receptor">
		</div>
		<div class="mt-4">
			<div class="form-check form-switch">
				<input onclick="usarDatos()" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
				<label class="form-check-label" for="flexSwitchCheckDefault">Usar los datos registrados en mi cuenta</label>
			</div>
		</div>
		<div class="modal-footer">
            <button  onclick="pagoEfectivo()" type="submit" class="btn btn-primary" style="width: 48%;">Pagar en efectivo</button>
            <button  type="button" data-bs-toggle="modal" data-bs-target="#modalTarjeta" class="btn btn-warning"  style="width: 48%;">Pagar con tarjeta</button>
        </div>
      </div>
    </div>

<!-- Modal Tarjeta -->
<div class="modal hide fade" id="modalTarjeta" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del pago</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form action="payment.php" method="POST" id="paymentFrm">
				<div class="form-group">
					<label>Numero de tarjeta</label>
					<div id="card_number" class="field" style="height: 40px; width: 100%;"></div>
				</div>
				<div class="row" style="width: 100%;">
					<div class="col">
						<div class="form-group">
							<label>Expiracion</label>
							<div id="card_expiry" class="field" style="height: 40px;"></div>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label>Codigo de seguridad</label>
							<div id="card_cvc" class="field" style="height: 40px;"></div>
						</div>
					</div>
				</div>
				<button onclick="cargarDireccion()" type="submit" class="btn btn-primary" id="payBtn">Aplicar pago</button>
			</form>
      </div>
    </div>
  </div>
</div>
<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
		fontWeight: 400,
		fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
		fontSize: '16px',
		lineHeight: '1.4',
		color: '#555',
		backgroundColor: '#fff',
		'::placeholder': {
			color: '#888',
		},
	},
	invalid: {
	  color: '#eb1c26',
	}
};

var cardElement = elements.create('cardNumber', {
	style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
  'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
  'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
	if (event.error) {
		resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
	} else {
		resultContainer.innerHTML = '';
	}
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
	e.preventDefault();
	createToken();
});

// Create single-use token to charge the user
function createToken() {
	stripe.createToken(cardElement).then(function(result) {
		if (result.error) {
			// Inform the user if there was an error
			resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
		} else {
			// Send the token to your server
			stripeTokenHandler(result.token);
		}
	});
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
	// Insert the token ID into the form so it gets submitted to the server
	var hiddenInput = document.createElement('input');
	hiddenInput.setAttribute('type', 'hidden');
	hiddenInput.setAttribute('name', 'stripeToken');
	hiddenInput.setAttribute('value', token.id);
	form.appendChild(hiddenInput);
	
	// Submit the form
	form.submit();
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>