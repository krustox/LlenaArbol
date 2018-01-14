<?php
    include('../Config/connection.php');
	include('../Archivo.php');
$display = trim($_POST["display_servicio"]);
$empresa = $_POST["empresa"];
$holding = $_POST["holding"];
$canal = $_POST["canal"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
		while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$dato = $canal."_".$nombre;
			$query= "INSERT INTO \"servicios\".\"servicio\" VALUES ('$canal','$dato','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("servicio_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'Servicio.php?ok=0';			
				}else{
					escribir("servicio_OK", $query . " OK");
					$extra = 'Servicio.php?ok=1';
				}
			}
		}
		
		header("Location: http://$host$uri/$extra");
}
?>