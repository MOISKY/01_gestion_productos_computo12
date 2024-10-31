<?php
class basedatos{
    public static function conectect(){
        $db = mysqli_connect("localhost","root","moises33","gestion_pedidos");
        return $db;
    }
}