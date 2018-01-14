<!DOCTYPE html>
<html lang="en">
<?php include('../head.php');?>
	<body>
		<div id="wrapper">
			<?php include('../header.php');?>
			<?php include('../success.php');?>
			<div id="container">
			<h2>Elemento</h2>
			<a href="Crear_Elemento.php">Crear Elemento</a>
			
				<table id="table">
<thead>
					<tr>
						<th>Nombre Subcomponente</th>
						<th>Nombre Elemento</th>
						<th>Display Elemento</th>
						<th>Accion</th>
					</tr>
</thead>					
<tbody>
				<?php
				$query= "Select * from \"servicios\".\"elemento\"";
				$conn_resource = db2_connect($conn_string, '', '');
				 if ($conn_resource) {
				 	$resp = db2_prepare($conn_resource, $query);
					 if($resp){
					 	$result = db2_exec($conn_resource, $query	);
						 if ($result) {
					 	 	while ($row = db2_fetch_array($result)) {
       						?><tr><td width="25%"><?php echo "$row[0] "; ?></td>
       						<td width="25%"><?php echo "$row[1] "; ?></td>
       						<td width="25%"><?php echo "$row[2] "; ?></td>
       						<td width="25%"><?php echo "<a onclick=\"eliminar('$row[0]','$row[1]','elemento')\">Eliminar</a>"; ?></td>
       						</tr><?php
      						}
						 }else{
						 	echo db2_stmt_errormsg();
						 }
      				}
				 }
				 db2_close($conn_resource);
				?>
				</tbody>
				</table>

			</div>

			<?php include('../footer.php');?>
		</div>
	</body>
</html>