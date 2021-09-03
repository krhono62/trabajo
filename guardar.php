<?php
if (!empty($_POST)){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    //echo $id;
    //echo $nombre;
    //echo $descripcion;

    $leer=fopen("pizzas.txt","r");
    $flag=true;
    while(!feof($leer)){
        $claveid=fgets($leer);
        $clavenom=fgets($leer);
        $clavedes=fgets($leer);
        if(trim($id)==trim($claveid)){
            echo "ERROR.....El registro ya existe";
            $flag=false;
            break;
        }
    }
    if($flag){
        $guardar=fopen('pizzas.txt','a+');
        fputs($guardar,$id."\n");
        fputs($guardar,$nombre."\n");
        fputs($guardar,$descripcion."\n");
        fclose($guardar);
        //echo "Datos guardados correctamente";
    }
    header("Location:gestionarMenu.php");

}
?>