<?php
session_start(); // Inicia la sesión (asegúrate de tener esto en todos los archivos donde uses sesiones)

session_unset(); // Libera todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirecciona a la página de inicio de sesión u otra página de tu elección
header("Location: index.php");
exit();
?>
