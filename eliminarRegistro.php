<?php
    $bus = $_POST['id'];

            include 'conexion2.php';
            $pdo = Database::connect();
            $sql = 'DELETE FROM ventas WHERE idVenta='.$bus.'';
                foreach ($pdo->query($sql) as $row){
                   
                }
                Database::disconnect();
                header("Location:admin-dashboard.php");

?>