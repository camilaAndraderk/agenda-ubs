<?php
namespace App\Helpers;

class Helper
{
    public static function pr($valor = "Aqui", $die = 1)
    {
        echo "<pre>";

        print_r($valor);
        
        if($die){
            die();
        }
    }
}