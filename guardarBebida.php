<?php
if (!empty($_POST)){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    //echo $id;
    //echo $nombre;
    //echo $descripcion;

    $leer=fopen("bebidas.txt","r");
    $flag=true;
    while(!feof($leer)){
        $claveid=fgets($leer);
        $clavenom=fgets($leer);
        $claveprecio=fgets($leer);
        if(trim($id)==trim($claveid)){
            echo "ERROR.....El registro ya existe";
            $flag=false;
            break;
        }
    }
    if($flag){
        $guardar=fopen('bebidas.txt','a+');
        fputs($guardar,$id."\n");
        fputs($guardar,$nombre."\n");
        fputs($guardar,$precio."\n");
        fclose($guardar);
        //echo "Datos guardados correctamente";
    }
    header("Location:gestionarMenu.php");

}
?>