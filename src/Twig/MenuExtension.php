<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class MenuExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('menuTree', [$this, 'getMenuTree']),
        ];
    }

    public function getMenuTree( $menus, $parent_id = 0 )
    {
        $arr = array_filter($menus,function($k) use ($parent_id) {
            return $k['parent_id'] == $parent_id;
        });
    
        return $arr;
    }
}