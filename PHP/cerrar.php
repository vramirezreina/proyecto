<?php
// Redirigir a la página de inicio de sesión
session_start();
session_unset();
session_destroy();
session_regenerate_id(true);
echo "Sesión cerrada"; // Mensaje de depuración
header("Location: ../PHP/login.php");
exit();
?>