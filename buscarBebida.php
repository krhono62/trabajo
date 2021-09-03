<?php		
$id = $_GET['id'];
    //echo $id;
$resulted;
    $leer=fopen("bebidas.txt","r");

    while(!feof($leer)){	
		$idBuscada=fgets($leer);
		$nombre=fgets($leer);
		$precio=fgets($leer);
		if($id==trim($idBuscada)){
            $resulted = "$nombre:$precio";
		}
	}
	fclose($leer);
    echo $resulted;
?>