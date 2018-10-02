		
if($state->execute()){
	$message = 'Ha creado un nuevo usuario exitosamente';
} else {
	$message = 'Ha ocurrido un error';
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Registro </title>
<link href="https://fonts.googleapis.com/css?family=PT+Sans|Yanone+Kaffeesatz" rel="stylesheet">
<link rel= "stylesheet" href="asssets/css/style.css">
</head>
<body>

<?php require 'partials/header.php'?>

<?php if(!empty($message)): ?>
<p> <?= $message?>  </p>
<?php endif; ?>

<h1>Registro </h1>
<span> o <a href="ingreso.php"> Ingresar </a></span>

<form action="registro.php" method="post">
<input type="text" name="email" placeholder="Ingrese un nuevo email" >
<input type="password" name="password" placeholder="Ingrese su contraseña" >
<input type="password" name="confirm_password" placeholder="Confirme su contraseña" >
<input type="submit" value="ingresar">
</form>

</body>
</html>
