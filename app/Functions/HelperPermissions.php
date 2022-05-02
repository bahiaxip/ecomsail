<?php declare(strict_types=1);
#helper que permite enlazar a una clase con sus métodos, definiendo un 
//tipo de helper encapsulado

/**
 * @return \App\Services\Helper\Helper
 */
function helper(): App\Functions\Permissions
{
    static $helper;

    return $helper ??= new App\Functions\Permissions();
}