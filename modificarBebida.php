<?php   
echo '<h1 class="mt-3 text-center mb-20">MODIFICAR UN REGISTRO</h1>';
if (!empty($_POST)){
    $busqueda = $_POST['id'];
    //echo $id;
    $mostrar=fopen('bebidas.txt','r');
    while(!feof($mostrar)){
      
      $id=fgets($mostrar);
      $nombre=fgets($mostrar);
      $precio=fgets($mostrar);
      if(trim($busqueda) == trim($id)){
      echo '<div style="width: 300px; margin-left: auto; margin-right: auto;">';
      echo '<form name=f1 action="guardarModificadoBebida.php" method="post" autocomplete="off">';
      echo '<table style=" width:200px;">';
      echo '<tr><TD>ID Bebida</TD><td style="padding:10px;"><input type="text" value="'.$id.'" name="id" required readonly></td></tr>';
      echo '<tr><TD>Nombre</TD><td style="padding:10px;"><input type="text" value="'.$nombre.'" name="nombre" required></td></tr>';
      echo '<tr><TD>Precio</TD><td style="padding:10px;"><textarea style="width:200px; height=auto;" name="precio" required>'.$precio.'</textarea></td></tr>';
      echo '<tr><td  align="center" style="padding:10px;"><input type="submit" class="btn btn-primary" value="Guardar"></td>';
      echo "</form>";
      echo '<td align="center"><a href="gestionarMenu.php" class="btn btn-secondary">REGRESAR</a></td>';
      echo '</tr>';
      echo "</table>";
      
      echo "</div>";
      }

      
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Modificar registro</title>
  </head>
    <body>

    <!--de aqui para aca-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>