<?php
        include('../Config/connection.php');
		include('../Archivo.php');
$display = trim($_POST["display_producto"]);
$empresa = $_POST["empresa"];
$holding = $_POST["holding"];
$canal = $_POST["canal"];
$servicio = $_POST["servicio"];
$tipo_servicio = $_POST["tipo_servicio"];
$segmento = $_POST["segmento"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
		while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$dato = $segmento."_".$nombre;
			$query= "INSERT INTO \"servicios\".\"producto\" VALUES ('$segmento','$dato','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("producto_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'Producto.php?ok=0';
				}else{
					escribir("producto_OK", $query . " OK");
					$extra = 'Producto.php?ok=1';
				}
			}
		}
		header("Location: http://$host$uri/$extra");
}
?>