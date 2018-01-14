<?php
        include('../Config/connection.php');
		include('../Archivo.php');
$display = trim($_POST["display_site"]);
$empresa = $_POST["empresa"];
$holding = $_POST["holding"];
$canal = $_POST["canal"];
$servicio = $_POST["servicio"];
$tipo_servicio = $_POST["tipo_servicio"];
$subservicio = $_POST["subservicio"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
		while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$dato = $subservicio."_".$nombre;
			$query= "INSERT INTO \"servicios\".\"site\" VALUES ('$subservicio','$dato','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("site_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'Site.php?ok=0';			
				}else{
					escribir("site_OK", $query . " OK");
					$extra = 'Site.php?ok=1';
				}
			}
		}
		header("Location: http://$host$uri/$extra");
}
?>