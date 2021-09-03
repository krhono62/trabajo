<?php		
if (!empty($_POST)){
    	$bus = $_POST['id'];
    	//echo $bus;
    	$leer=fopen("bebidas.txt","r");
    	$escribir=fopen("temp2.txt","a+");
    	while(!feof($leer)){
			$id=fgets($leer);
			$nombre=fgets($leer);
			$precio=fgets($leer);
			if(trim($bus)!=trim($id)){
				fputs($escribir,$id);
				fputs($escribir,$nombre);
				fputs($escribir,$precio);
			}
		}
		fclose($leer);
		fclose($escribir);
		if(rename("temp2.txt","bebidas.txt"))
			//echo "Registro eliminado correctamente!!!!!<br>";
		header("Location:gestionarMenu.php");
    }
        ?>