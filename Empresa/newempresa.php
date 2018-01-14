<?php
include('../Config/connection.php');
include('../Archivo.php');
$display = trim($_POST["display_empresa"]);
$holding = $_POST["holding"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);

$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
		while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$dato = $holding."_".$nombre;
			$query= "INSERT INTO \"servicios\".\"empresa\" VALUES ('$holding','$nombre','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("empresa_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'Empresa.php?ok=0';			
				}else{
					escribir("empresa_OK", $query . " OK");
					$extra = 'Empresa.php?ok=1';
				}
			}
		}
		header("Location: http://$host$uri/$extra");
}
?>