<?php
        include('../Config/connection.php');
		include('../Archivo.php');
$display = trim($_POST["display_subservicio"]);
$empresa = $_POST["empresa"];
$holding = $_POST["holding"];
$canal = $_POST["canal"];
$servicio = $_POST["servicio"];
$tipo_servicio = $_POST["tipo_servicio"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
		while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$dato = $tipo_servicio."_".$nombre;
			$query= "INSERT INTO \"servicios\".\"subservicio\" VALUES ('$tipo_servicio','$dato','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("subservicio_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'Subservicio.php?ok=0';
				}else{
					escribir("subservicio_OK", $query . " OK");
					$extra = 'Subservicio.php?ok=1';
				}
			}
		}
		header("Location: http://$host$uri/$extra");
}
?>