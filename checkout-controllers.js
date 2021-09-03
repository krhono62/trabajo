function redirectToCart(){
    window.location.replace('/dashboard.php');
}

function redirectToCheckout(){
    window.location.replace('/checkout.php');
}

function datosEnvioRellenos(){
  if(document.getElementById("nombre-receptor").value=="" ||
  document.getElementById("telefono-receptor").value=="" ||
  document.getElementById("calle-receptor").value=="" ||
  document.getElementById("colonia-receptor").value==""){
    alert("Debe rellenar los datos de envío");
    return false;
  }
  return true;
}

function pagoEfectivo(){
  if(datosEnvioRellenos()){
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
      var tipoPago = "Efectivo";
      var estado = "En Curso";
      var direccion = getDireccion();
      queryInsert = queryInsert + "INSERT INTO venta_detalle(idVenta,articulo,descripcion) values ("+"?"+",'"+articulo+"','"+descripcion+"');+";
      if((indice+1)>=cart.length){
        queryInsert = "INSERT INTO ventas(idUsuario,fecha,total,tipoPago,estado,direccion) values ("+"'"+uid+"',"+"NOW()"+","+subTotal+",'"+tipoPago+"','"+estado+"',\""+direccion+"\");+"+queryInsert;
      }
    }
    console.log(cart);
    var result = "success";
    var tID = "Inventada";
    window.location.replace('/insertarBDD.php?status='+result+'&querys='+queryInsert+'&transactionID='+tID+'&total='+subTotal);
  }
}

function getDireccion(){
  var calle = document.getElementById("calle-receptor").value;
  var colonia = document.getElementById("colonia-receptor").value;
  return calle + ", " + colonia;
}

function cargarDireccion(){
  sessionStorage.setItem("direccion", getDireccion());
}

function usarDatos() {
    // Get the checkbox
    var checkBox = document.getElementById("flexSwitchCheckDefault");
    // Get the output text
  
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      firebase.database().ref().child("usuarios").child(firebase.auth().currentUser.uid).get().then(function(snapshot) {
        if (snapshot.exists()) {
          document.getElementById("nombre-receptor").value=snapshot.child("nombre").val();
          document.getElementById("telefono-receptor").value=snapshot.child("telefono").val();
          document.getElementById("calle-receptor").value=snapshot.child("calle").val();
          document.getElementById("colonia-receptor").value=snapshot.child("colonia").val();
  
        }
        else {
          console.log("No data available");
        }
      }).catch(function(error) {
        console.error(error);
      });
    } else {
      document.getElementById("nombre-receptor").value="";
      document.getElementById("telefono-receptor").value="";
      document.getElementById("calle-receptor").value="";
      document.getElementById("colonia-receptor").value="";
    }
  }
