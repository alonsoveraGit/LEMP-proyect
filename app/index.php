<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos ingresados por el usuario
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Establecer la conexión con la base de datos
  $db_host = 'mariadb';
  $db_user = 'root';
  $db_password = 'bolson';
  $db_name = 'usuarios';

  $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

  // Verificar si la conexión fue exitosa
  if ($conn->connect_error) {
    die('Error de conexión a la base de datos: ' . $conn->connect_error);
  }

  // Consultar la base de datos para verificar el inicio de sesión utilizando consultas preparadas
  $query = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();



  if ($result->num_rows > 0) {
    // Inicio de sesión exitoso, redirigir al usuario a la página "monitoring"
	
	echo "<h1>Nombre de usuario corectos.</h1>";

	
  } else {
    echo "<h1>Nombre de usuario o contraseña incorrectos.</h1>";
  }


  // Cerrar la conexión a la base de datos
  $stmt->close();
  $conn->close();
}
?>
<div class="container">
  <div class="screen">
    <div class="screen__content">
      <form class="login" method="POST" action="index.php">
        <div class="login__field">
          <i class="login__icon fas fa-user"></i>
          <input type="text" class="login__input" name="username" placeholder="User name / Email">
        </div>
        <div class="login__field">
          <i class="login__icon fas fa-lock"></i>
          <input type="password" class="login__input" name="password" placeholder="Password">
        </div>
        <button class="button login__submit" type="submit">
          <span class="button__text">Log In Now</span>
          <i class="button__icon fas fa-chevron-right"></i>
        </button>       
      </form>
      <div class="social-login">
        <h3>log in via</h3>
        <div class="social-icons">
          <a href="#" class="social-login__icon fab fa-instagram"></a>
		  <a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<!-- partial -->
  
</body>
</html>
