<?php

namespace Intranet\Services;

class SignaturaService
{
    public static function exec($dni,$style='',$ratio=1,$notFound=null){
        $x = $ratio * 260;
        $y = $ratio * 220;
        if (file_exists(storage_path().'/app/public/signatures/'.$dni.'.png')){
            $ruta = public_path('/storage/signatures/'.$dni.'.png');
            return "<div style='".$style."'><img style='width:".(int)$x."px;heigth:".(int)$y."px' src='".$ruta."' alt='Signatura:'/></div>";
        } else{
            return $notFound;
        }
    }
}