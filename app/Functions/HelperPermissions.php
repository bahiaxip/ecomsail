<?php declare(strict_types=1);
#helper que permite enlazar a una clase con sus métodos, definiendo un 
//tipo de helper encapsulado

/**
 * @return \App\Services\Helper\Helper
 */
function helper(): App\Functions\Permissions
{
    static $helper;
    //falla en server aunque tengo la versión 7.3 (el operador ?? debería funcionar)
    //return $helper ??= new App\Functions\Permissions();
    $helper = new App\Functions\Permissions();
    if($helper)
        return $helper;
}