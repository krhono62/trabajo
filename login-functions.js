
var firebaseConfig = {
  apiKey: "AIzaSyD92kNdiHrn0fxWRgrOgJwdnRlAM4IZjfY",
  authDomain: "donpizza-20cbd.firebaseapp.com",
  projectId: "donpizza-20cbd",
  storageBucket: "donpizza-20cbd.appspot.com",
  messagingSenderId: "1002015259946",
  appId: "1:1002015259946:web:aa2efe58bf5ee7777ff253",
  measurementId: "G-XZ2XXBK044",
  databaseURL: "https://donpizza-20cbd-default-rtdb.firebaseio.com/"
};
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      console.log("Logueado");
    } else {
      console.log("Sin sesion");
    }
  });
  function login(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    firebase.auth().signInWithEmailAndPassword(email,password)
      .then((user) => {
        if(firebase.auth().currentUser.uid == "tbfThFccmiRWzRtk3KJAmTeht2u2" || firebase.auth().currentUser.uid == "sTBIDV3rwvPUrfakgKBWQACVRl23"){
          window.location.replace('/admin-dashboard.php');
        }else{
          window.location.replace('/dashboard.php');
        }
      })
      .catch((error) => {
          var errorCode = error.code;
          var errorMessage = error.message;
          alert(errorMessage);
    });
    
}
function logout(){
  firebase.auth().signOut().then(() => {
      alert("Sesion cerrada");
      window.location.replace('/login.html');
    }).catch((error) => {
      alert(error.message);
    });
}
  function registro(userId){
    var name = document.getElementById("name-register").value;
    var telefonoCelular = document.getElementById("phone-register").value;
    var domicilio = document.getElementById("adress-register").value;
    var coloniaCliente = document.getElementById("colonia-register").value;
    firebase.database().ref('usuarios/' + firebase.auth().currentUser.uid).set({
      nombre: name,
      calle: domicilio,
      telefono: telefonoCelular,
      colonia: coloniaCliente
    }).then(function onSuccess(res){
      window.location.replace('/dashboard.php');
    }).catch(function onError(err){
      console.log.err.message;
    });
  }
  function signUp(){
    var email = document.getElementById("email-register").value;
    var password = document.getElementById("password-register").value;
    firebase.auth().createUserWithEmailAndPassword(email, password)
  .then((user) => {
    alert("Registrado");
    registro(user.uid);
    
  })
  .catch((error) => {
    var errorCode = error.code;
    var errorMessage = error.message;
    alert(error.message);
  });
  }

  function recoverPassword(){
    var auth = firebase.auth();
    var emailAddress = document.getElementById("email-recover").value;
    auth.sendPasswordResetEmail(emailAddress).then(function() {
      alert("Email de recuperacion enviado");
      window.location.replace('/login.html');
    }).catch(function(error) {
      alert(error.message);
    });
  }
  
