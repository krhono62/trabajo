<?php		
$id = $_GET['id'];
$resulted;
    $leer=fopen("pizzas.txt","r");

    while(!feof($leer)){
		$idBuscada=fgets($leer);
		$nombre=fgets($leer);
		$descripcion=fgets($leer);
		if($id==trim($idBuscada)){
            $resulted = $nombre;
		}
	}
	fclose($leer);
    echo $resulted;
?>