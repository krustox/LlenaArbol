<?php
include('../Config/connection.php');
include('../Archivo.php');
	$output = shell_exec('C:\plink.exe root@167.28.131.172 -pw 14MontHL  /monit/ejecutarSincronizacion.sh');
	escribir("sync", $output);
	$text = "";
	$tabla = array("holding","empresa","canal","servicio","tipo_servicio","subservicio","site","componente","subcomponente","elemento","agrupacion","segmento","producto","transaccion","operacion");
	$tabla_len = sizeof($tabla);
	while($tabla_len > 0){
	$tabla_len = $tabla_len - 1;
	if(file_exists("../backup/".$tabla[$tabla_len].'.data')){
		unlink("../backup/".$tabla[$tabla_len].'.data');
	}
	$query= "Select * from \"servicios\".\"$tabla[$tabla_len]\"";
	$conn_resource = db2_connect($conn_string, '', '');
	if ($conn_resource) {
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
			$result = db2_exec($conn_resource, $query	);
			if ($result) {
				while ($row = db2_fetch_array($result)) {
					$cont = sizeof($row);
					$texto = "";
					$i = 0;
					while ($cont >0){
						$cont = $cont - 1;
						$texto = $texto . "\"$row[$i]\",";
						$i= $i+1;
					}
					$len = sizeof($texto);
					$texto = substr($texto, 0, -1);
					$text = $text . $texto . PHP_EOL;
       				backup("../backup/".$tabla[$tabla_len], $texto);
      			}
			}else{
				echo db2_stmt_errormsg();
		 	}
		}
	}	
	}
 db2_close($conn_resource);
	 escribir("backup", $text)
?>