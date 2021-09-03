var cart = JSON.parse(sessionStorage.getItem("items"));
if (cart == null) {
  cart = [];
}

function getNumeroItems(){
  console.log(cart.length);
  return cart.length;
}

function getCarrito(){
  return cart;
}

// Get a reference to the database service
function obtenerNombre() {
  var starCountRef = firebase.database().ref('usuarios/' + firebase.auth().currentUser.uid);
  starCountRef.on('value', (snapshot) => {
    const data = snapshot.val();
    log(data);
  });
}
firebase.auth().onAuthStateChanged(function (user) {
  if (user) {
    console.log("Logueado");
  } else {
    window.location.replace('/login.html');

  }

});

//This function will be add the products to cart(array)
function addToCart(idProd, descripcion, quantityMinis, quantityBigs) {
  var total = (parseFloat(quantityMinis) * 40) + (parseFloat(quantityBigs) * 50)
  var uid = firebase.auth().currentUser.uid;
  let itemCart = {
    "total": total,
    "name": idProd,
    "mini": quantityMinis,
    "grande": quantityBigs,
    "descripcion": descripcion,
    "tipo": "pizza",
    "UID": uid
  }
  cart.push(itemCart);
  sessionStorage.setItem("items", JSON.stringify(cart));
  console.log(cart[0]);
}
function addToCartBebida(idProd, cantidad, precio) {
  var total = (parseFloat(cantidad) * parseFloat(precio));
  var uid = firebase.auth().currentUser.uid;
  let itemCart = {
    "total": total,
    "name": idProd,
    "mini": 0,
    "grande": cantidad,
    "descripcion": idProd,
    "tipo": "bebida",
    "UID": uid
  }
  cart.push(itemCart);
  sessionStorage.setItem("items", JSON.stringify(cart));
  console.log(cart[0]);
}

function goToCart() {
  window.location.replace('/cart.html');
}

function misPedidos(){
  window.location.replace('/mispedidos.php?uid='+firebase.auth().currentUser.uid);
}

function getData() {
  firebase.database().ref().child("usuarios").child(firebase.auth().currentUser.uid).get().then(function (snapshot) {
    if (snapshot.exists()) {
      document.getElementById("nombre-modal").innerHTML = snapshot.child("nombre").val();
      document.getElementById("numero-modal").innerHTML = snapshot.child("telefono").val();
      document.getElementById("direccion-modal").innerHTML = snapshot.child("calle").val();
      document.getElementById("colonia-modal").innerHTML = snapshot.child("colonia").val();
    }
    else {
      console.log("No data available");
    }
  }).catch(function (error) {
    console.error(error);
  });

}
function deleteUser() {
  var user = firebase.auth().currentUser;
  firebase.database().ref().child("usuarios").child(user.uid).remove();
  user.delete().then(function () {
    alert("Has eliminado tu cuenta correctamente");
  }).then(function onSuccess(res) {
    window.location.replace('/login.html');
  })
    .catch(function (error) {
      // An error happened.
    });
}

function fillData() {
  document.getElementById("name-change").value = document.getElementById("nombre-modal").innerHTML;
  document.getElementById("phone-change").value = document.getElementById("numero-modal").innerHTML;
  document.getElementById("adress-change").value = document.getElementById("direccion-modal").innerHTML;
  document.getElementById("colonia-change").value = document.getElementById("colonia-modal").innerHTML;
}
function updateData() {
  var name = document.getElementById("name-change").value;
  var telefonoCelular = document.getElementById("phone-change").value;
  var domicilio = document.getElementById("adress-change").value;
  var coloniaCliente = document.getElementById("colonia-change").value;
  firebase.database().ref('usuarios/' + firebase.auth().currentUser.uid).set({
    nombre: name,
    calle: domicilio,
    telefono: telefonoCelular,
    colonia: coloniaCliente
  }).then(function onSuccess(res) {
    alert("Actualizamos tus datos");
  }).catch(function onError(err) {
    console.log.err.message;
  });
}
function listCart() {
  let msg = '';
  if (cart.length > 0) {
    var totalPagar = 0;
    msg += `
    <div style="background-color: white; " class="table-responsive pt-4 vh-100">
        <h3>Productos en el carrito</h3>
        <table class="table table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Description</th>
                    <th>Cantidad</th>
                    <th>Subotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            `
    for (let i = 0; i < cart.length; i++) {
      const element = cart[i];
      totalPagar += parseFloat(element.total);
      if (element.tipo == "pizza") {
        msg += `
                  <tr>
                      <td style="max-width: 100px;">
                          <img class="img-fluid" src="image2.png">
                      </td>
                      <td>Pizza</td>
                      <td>${element.descripcion}</td>
                      <td>Minis: ${element.mini}, Grandes: ${element.grande}</td>
                      <td>$ ${element.total}</td>
                      <td>
                          <button class="btn btn-outline-danger btn-block" onclick="deleteProductInCart(${i});">
                              <i class="fas fa-trash-alt"></i>
                              Quitar
                          </button>
                      </td>
                  </tr>
                  `
      } else {
        msg += `
          <tr>
              <td style="max-width: 100px;">
                  <img class="img-fluid" src="image3.jpg">
              </td>
              <td>Bebida</td>
              <td>${element.name}</td>
              <td>${element.grande}</td>
              <td>$ ${element.total}</td>
              <td>
                  <button class="btn btn-outline-danger btn-block" onclick="deleteProductInCart(${i});">
                      <i class="fas fa-trash-alt"></i>
                      Quitar
                  </button>
              </td>
          </tr>
          `
      }
    }
    msg += `
            </tbody>
        </table >
    </div >
    `
    document.getElementById('pay').disabled = false;
    document.getElementById('pay').innerHTML = "Pagar $" + totalPagar;
    document.getElementById('containerCart').innerHTML = msg;
  } else {
    document.getElementById('pay').innerHTML = "Pagar $0";
    document.getElementById('pay').disabled = true;
    document.getElementById('containerCart').innerHTML = "El carrito esta vacio";
  }
}
function deleteProductInCart(pos) {
  cart.splice(pos, 1)
  sessionStorage.setItem("items", JSON.stringify(cart));
  listCart();
}

function goToPay() {
  window.location.replace('/checkout.php');
}