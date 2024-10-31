<?php
class usuario{
    private $id;
    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $email;
    private $contraseña;
    private $imagen;
    private $db;

    public function __construct(){
        $this->db = basedatos::conectect();
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido_paterno(){
        return $this->apellido_paterno;
    }

    public function getApellido_materno(){
        return $this->apellido_materno;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getContraseña(){
        return $this->contraseña;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    public function setApellido_paterno($apellido_paterno){
        $this->apellido_paterno = $this->db->real_escape_string($apellido_paterno);
    }

    public function setApellido_materno($apellido_materno){
        $this->apellido_materno = $this->db->real_escape_string($apellido_materno);
    }

    public function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }

    public function setContraseña($contraseña){
        $this->contraseña = $contraseña;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function guardar(){
        $sql = "INSERT INTO db_cuenta_usuario(nombre,apellido_paterno,apellido_materno,email,contrasena,imagen,estado) VALUES('{$this->getNombre()}','{$this->getApellido_paterno()}','{$this->getApellido_materno()}','{$this->getEmail()}','{$this->getContraseña()}',NULL,NULL);";
        $guardado = $this->db->query($sql);
        $resultado = false;
        if($guardado){
            $resultado = true;
        }
        return $resultado;
    }

    public function iniciar_sesion(){
        $resultado = false;
        $email = $this->getEmail();
        $contraseña = $this->getContraseña();
        $sql = "SELECT * FROM db_cuenta_usuario WHERE email = '{$email}'";
        $iniciar_sesion = $this->db->query($sql);
        if($iniciar_sesion && $iniciar_sesion->num_rows == 1){
            $usuario = $iniciar_sesion->fetch_object();
            $verificar = password_verify($contraseña,$usuario->contraseña);
            if($verificar){
                $resultado = $usuario;
            }
        }
        return $resultado;
    }
}