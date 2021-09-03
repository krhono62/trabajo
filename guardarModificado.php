<?php		
if (!empty($_POST)){
    $idn = $_POST['id'];
    $nombren = $_POST['nombre'];
    $descripcionn = $_POST['descripcion'];
    //echo $idn;
    //echo $nombren;
    //echo $descripcionn;

    $leer=fopen("pizzas.txt","r");
	$escribir=fopen("temp.txt","a+");
	while(!feof($leer)){					
		$id=fgets($leer);
		$nombre=fgets($leer);
		$descripcion=fgets($leer);
		if(trim($idn)!=trim($id)){
			fputs($escribir,$id);
			fputs($escribir,$nombre);
			fputs($escribir,$descripcion);
		}
		else{
			fputs($escribir,$idn."\n");
			fputs($escribir,$nombren."\n");
			fputs($escribir,$descripcionn);
		}
	}
	fclose($leer);
	fclose($escribir);
	if(rename("temp.txt","pizzas.txt"))
		//echo "Registro editado correctamente!!!!!<br>";
    header("Location:gestionarMenu.php");		
						
}
?>