<?php
    $bus = $_POST['id'];
            include 'conexion2.php';
            $pdo = Database::connect();
            $sql = 'UPDATE ventas SET estado="Cancelado" WHERE idVenta='.$bus.'';
                foreach ($pdo->query($sql) as $row){
                }
                Database::disconnect();
                header("Location:admin-dashboard.php");

?>