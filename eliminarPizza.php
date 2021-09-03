<?php		
if (!empty($_POST)){
    $bus = $_POST['id'];
    //echo $bus;

    $leer=fopen("pizzas.txt","r");
    $escribir=fopen("temp.txt","a+");

    while(!feof($leer)){					
		$id=fgets($leer);
		$nombre=fgets($leer);
		$descripcion=fgets($leer);
		if(trim($bus)!=trim($id)){
		    //echo $id;
			fputs($escribir,$id);
			fputs($escribir,$nombre);
			fputs($escribir,$descripcion);
		}
	}
	fclose($leer);
	fclose($escribir);
	if(rename("temp.txt","pizzas.txt"))
		//echo "Registro eliminado correctamente!!!!!<br>";
    header("Location:gestionarMenu.php");
}
?>