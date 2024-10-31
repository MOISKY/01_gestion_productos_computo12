<?php
require_once 'models/usuario.php';
class usuarioController{
    public function agregar_usuario(){
        require_once "views/usuarios/agregar_usuario.php";
    }

    public function eliminar_usuario(){

    }

    public function modificar_usuario(){

    }

    public function mostrar_usuario(){

    }
    
    public function mostrar_todos_usuarios(){

    }

    public function comenzar_sesion(){
        require_once "views/usuarios/iniciar_sesion.php";
    }

    public function guardar_usuario(){
        if(isset($_POST)){
            $nombre = isset($_POST['nombre'])?$_POST['nombre']:false;
            $apellido_paterno = isset($_POST['apellido_paterno'])?$_POST['apellido_paterno']:false;
            $apellido_materno = isset($_POST['apellido_materno'])?$_POST['apellido_materno']:false;
            $email = isset($_POST['email'])?$_POST['email']:false;
            $contraseña = isset($_POST['contraseña'])?$_POST['contraseña']:false;
        if($nombre && $apellido_paterno && $apellido_paterno && $email && $contraseña){
            $usuario = new usuario();
            $usuario->setNombre($nombre);
            $usuario->setApellido_paterno($apellido_paterno);
            $usuario->setApellido_materno($apellido_materno);
            $usuario->setEmail($email);
            $usuario->setContraseña($contraseña);
            $guardar = $usuario->guardar();
            if($guardar){
                $_SESSION['register'] = 'complete';
            }
            else{
                $_SESSION['register'] = 'failed';
            }
        }else{
            $_SESSION['register'] = 'failed';
        }
    }else{
        $_SESSION['register'] = 'failed';
    }
        header("Location:http://localhost/01_gestion_productos_computo12/views/usuarios/agregar_usuario");
    }

    public function iniciar_sesion(){
        if(isset($_POST)){
            $usuario = new usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setContraseña($_POST['contraseña']);
            $identidad = $usuario->iniciar_sesion();
            if($identidad && is_object($identidad)){
                $_SESSION['identity'] = $identidad;
                if($identidad->role == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'identificacion fallida !!';
            }
        }
    }

    public function cerrar_sesion(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
    }
}