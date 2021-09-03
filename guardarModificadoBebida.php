<?php		
if (!empty($_POST)){
    //echo "Se ha modificado la bebida";
    $idn = $_POST['id'];
    $nombren = $_POST['nombre'];
    $precion = $_POST['precio'];
    //echo $idn;
    //echo $nombren;
    //echo $precio;

    $leer=fopen("bebidas.txt","r");
    $escribir=fopen("temp.txt","a+");
    while(!feof($leer)){					
        $id=fgets($leer);
        $nombre=fgets($leer);
        $precio=fgets($leer);
        if(trim($idn)!=trim($id)){
            fputs($escribir,$id);
            fputs($escribir,$nombre);
            fputs($escribir,$precio);
        }
        else{
            fputs($escribir,$idn."\n");
            fputs($escribir,$nombren."\n");
            fputs($escribir,$precion."");
        }
    }
    fclose($leer);
    fclose($escribir);
    if(rename("temp.txt","bebidas.txt"))
        //echo "Registro editado correctamente!!!!!<br>";
    header("Location:gestionarMenu.php");
						
}
?>