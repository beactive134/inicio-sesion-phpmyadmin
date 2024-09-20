<h1>Inicio de Sesión</h1>
<form method="POST" action="index.php?action=iniciarSesion">
    <label for="correo_electronico">Correo Electrónico:</label>
    <input type="email" name="correo_electronico" required>
    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" required>
    <button type="submit">Iniciar Sesión</button>
</form>
<a href="?action=mostrarRegistro">Registrar Estudiante</a>