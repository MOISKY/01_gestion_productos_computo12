<?php
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

    public function guardar_usuario(){
        if(isset($_POST)){
            var_dump($_POST);
        }
    }
}