<?php
class basedatos{
    public static function conectect(){
        $db = mysqli_connect("localhost","Moisky","moises2019","gestion_pedidos");
        $db -> query("SET_NAMES 'utf-8'");
        return $db;
    }
}