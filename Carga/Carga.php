<!DOCTYPE html>
<html lang="en">
	<?php include('../head.php');?>
	<body>
		<div id="wrapper">
			<?php include('../header.php');?>
			<div id="container">
			<h2>Carga Masiva</h2>

			<div class="formularios">
				<form action="Cargar.php" method="post" enctype="multipart/form-data"> 
   				<input name="userfile" type="file"> 
   				<br> 
   				<input type="submit" value="Enviar"> 
				</form>
			</div>
			</div>
			<?php include('../footer.php');?>
		</div>
	</body>
</html>
