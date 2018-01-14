<?php
    include('../Config/connection.php');
	$conn_resource = db2_connect($conn_string, '', '');
	if ($conn_resource) {
		$query= "DELETE FROM \"servicios\".\"elemento\" ";
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if ($result) {
				
			}else{
				echo db2_stmt_errormsg();
			}
    	}
		$query= "DELETE FROM \"servicios\".\"subcomponente\" ";
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if ($result) {
				
			}else{
				echo db2_stmt_errormsg();
			}
    	}
		$query= "DELETE FROM \"servicios\".\"componente\" ";
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if ($result) {
				
			}else{
				echo db2_stmt_errormsg();
			}
    	}
		$query= "DELETE FROM \"servicios\".\"site\" ";
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if ($result) {
				
			}else{
				echo db2_stmt_errormsg();
			}
    	}
		$query= "DELETE FROM \"servicios\".\"subservicio\" ";
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if ($result) {
				
			}else{
				echo db2_stmt_errormsg();
			}
    	}
		$query= "DELETE FROM \"servicios\".\"tipo_servicio\" ";
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if ($result) {
				
			}else{
				echo db2_stmt_errormsg();
			}
    	}
		$query= "DELETE FROM \"servicios\".\"servicio\" ";
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if ($result) {
				
			}else{
				echo db2_stmt_errormsg();
			}
    	}
		$query= "DELETE FROM \"servicios\".\"canal\" ";
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if ($result) {
				
			}else{
				echo db2_stmt_errormsg();
			}
    	}
		$query= "DELETE FROM \"servicios\".\"empresa\" ";
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if ($result) {
				
			}else{
				echo db2_stmt_errormsg();
			}
    	}
		$query= "DELETE FROM \"servicios\".\"holding\" ";
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if ($result) {
				
			}else{
				echo db2_stmt_errormsg();
			}
    	}
	}
	db2_close($conn_resource);
	
?>