<?php
require_once 'modelo/Estudiante.php';
class ControladorEstudiante
{
    private $modelo;
    public function __construct()
    {
        $this->modelo = new Estudiante();
    }
    public function mostrarLogin()
    {
        require 'vista/login.php';
    }
    public function iniciarSesion($correo_electronico, $contrasena)
    {
        if ($this->modelo->verificarCredenciales(
            $correo_electronico,
            $contrasena
        )) {
            session_start();
            $_SESSION['usuario'] = $correo_electronico;
            header('Location: vista/bienvenida.php');
        } else {
            echo "Credenciales incorrectas.";
        }
    }
    public function mostrarRegistro()
    {
        require 'vista/registro.php';
    }
    public function registrarEstudiante(
        $nombre_usuario,
        $correo_electronico,
        $contrasena
    ) {
        if ($this->modelo->registrar(
            $nombre_usuario,
            $correo_electronico,
            $contrasena
        )) {
            echo "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            echo "Error al registrar.";
        }
    }
}
