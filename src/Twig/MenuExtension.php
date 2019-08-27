<?php

namespace App\Twig;

use App\Twig\AppRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class MenuExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('menuTree', [AppRuntime::class, 'getMenuTree']),
            new TwigFunction('pageName', [AppRuntime::class, 'getPageName']),
        ];
    }

    // public function getMenuTree( $menus, $parent_id = 0 )
    // {
    //     $arr = array_filter($menus,function($k) use ($parent_id) {
    //         return $k['parent_id'] == $parent_id;
    //     });
    
    //     return $arr;
    // }

    // public function getPageName()
    // {
    //     echo "Pages";
    // }

}