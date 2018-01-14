<?php
  		include('../Config/connection.php');
        include('../Archivo.php');
$display = trim($_POST["display_operacion"]);
$empresa = $_POST["empresa"];
$holding = $_POST["holding"];
$canal = $_POST["canal"];
$servicio = $_POST["servicio"];
$tipo_servicio = $_POST["tipo_servicio"];
$segmento = $_POST["segmento"];
$producto = $_POST["producto"];
$transaccion = $_POST["transaccion"];
$ext = explode("_", $transaccion);
$extl = sizeof($ext);
$nom="";
//if($ext[$extl-1] != "WAS" && $ext[$extl-1] != "S.O" && $ext[$extl-1] != "BROKER" && $ext[$extl-1] != "MQ"){
//	$nom = "_".$ext[$extl-1];
//}
//$dato = $nombre."_".$display_sub;
$elementos = explode(",",$display);
$tam = sizeof($elementos);
$conn_resource = db2_connect($conn_string, '', '');
if ($conn_resource) {
		while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$dif = explode(" ",$display);
			$difl = sizeof($dif);
			$nombre = strtoupper(str_replace(" ", "_", $display));
			$display = $display.$nom;
			$query= "INSERT INTO \"servicios\".\"operacion\" VALUES ('$transaccion','$nombre','$display')";
			$resp = db2_prepare($conn_resource, $query);
			if($resp){
				$result = db2_exec($conn_resource, $query);
				if(!$result){
					escribir("operacion_Error", $query . " " .db2_stmt_errormsg());
					$extra = 'Operacion.php?ok=0';
				}else{
					escribir("operacion_OK", $query . " OK" );
					$extra = 'Operacion.php?ok=1';
				}
			}
		}
			header("Location: http://$host$uri/$extra");
}

?>