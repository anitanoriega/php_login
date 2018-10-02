<?php

session_start();

if(isset($_SESSION['usuarios_id'])){
	header('Location: /index.php');
}
require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])){
	$records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records-> fetch(PDO::FETCH_ASSOC);
	
	$message =' ';
	
if(count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
	$_SESSION['usuarioss_id'] = $results['id'];
	header('Location: /index.php');
} else{
	$message = 'Lo sentimos, los credenciales no coinciden,registre una cuenta :) ';
}
   $_SESSION['user_id'] = $results['id'];
      header("Location: /php-login");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ingreso </title>
<link href="https://fonts.googleapis.com/css?family=PT+Sans|Yanone+Kaffeesatz" rel="stylesheet">
<link rel= "stylesheet" href="asssets/css/style.css">
</head>
<body>
<?php require 'partials/header.php' ?>

<?php if(!empty($message)): ?>
<p><?=$message?></p>
<?php endif;?>

<h1> Ingreso </h1>
<span> o <a href="registro.php"> Registrese </a></span>

<form action="ingreso.php" method="post">
<input type="text" name="email" placeholder="Ingrese su correo electrónico" >
<input type="password" name="password" placeholder="Ingrese su contraseña" >
<input type="submit" value="ingresar">
</form>

</body>
</html>
