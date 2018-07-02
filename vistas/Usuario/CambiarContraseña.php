<form action="Contro.php?c=Usuario&a=CambiarContra" method="POST">
	<input type="hidden" name="id_usuario" value="<?php echo $_GET['id'] ?>">
	<input type="password" name="Contrasena">
	<p id="ContraVal"></p>
	<input type="password" name="Contrasena1">
	<p id="ContraVal1"></p>
	<input type="submit" name="">
</form>

<?php include "Validar.php" ?>
