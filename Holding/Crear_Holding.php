<!DOCTYPE html>
<html lang="en">
<?php include('../head.php');?>
	<body>
		<div id="wrapper">
			<?php include('../header.php');?>
			<?php include('../success.php');?>
			<div id="container">
			<h2>Crear Holding</h2>
			<div class="formularios">
				<form action="newholding.php" method="post">
					<label>Nombre Holding</label>
					<input type="text" name="display_holding" id="display_holding" />
					<input type="submit" value="Enviar" />
				</form>
			</div>
			</div>
			<?php include('../footer.php');?>
		</div>
	</body>
</html>
