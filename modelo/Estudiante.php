<?php
require_once 'modelo/Conexion.php';
class Estudiante
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = (new Conexion())->getConexion();
    }
    public function registrar(
        $nombre_usuario,
        $correo_electronico,
        $contrasena
    ) {
        $contrasena_hashed = password_hash(
            $contrasena,
            PASSWORD_DEFAULT
        );
        $stmt = $this->conexion->prepare("INSERT INTO estudiante (nombre_usuario, correo_electronico, contrasena) VALUES (?, ?, ?)");
        $stmt->bind_param(
            "sss",
            $nombre_usuario,
            $correo_electronico,
            $contrasena_hashed
        );
        return $stmt->execute();
    }
    public function verificarCredenciales(
        $correo_electronico,
        $contrasena
    ) {
        $stmt = $this->conexion->prepare("SELECT contrasena FROM estudiante WHERE correo_electronico = ?");
        $stmt->bind_param("s", $correo_electronico);
        $stmt->execute();
        $stmt->bind_result($contrasena_hashed);
        $stmt->fetch();
        return password_verify($contrasena, $contrasena_hashed);
    }
}
