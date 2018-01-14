<?php
        include('../Config/connection.php');
		include('../Archivo.php');
$display = trim($_POST["display_segmento"]);
$empresa = $_POST["empresa"];
$holding = $_POST["holding"];
$canal = $_POST["canal"];
$servicio = $_POST["servicio"];
$tipo_servicio = $_POST["tipo_servicio"];
$agrupacion = $_POST["agrupacion"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
		while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$dato = $agrupacion."_".$nombre;
			$query= "INSERT INTO \"servicios\".\"segmento\" VALUES ('$agrupacion','$dato','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("segmento_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'Segmento.php?ok=0';			
				}else{
					escribir("segmento_OK", $query . " OK");
					$extra = 'Segmento.php?ok=1';
				}
			}
		}
		header("Location: http://$host$uri/$extra");
}
?>