<?php

namespace App\Twig;

use Twig\Extension\RuntimeExtensionInterface;

use App\Controller;
use App\Entity\Menu;
use App\Form\MenuType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppRuntime extends AbstractController implements RuntimeExtensionInterface
{
    public function __construct(){}

    public function getMenuTree( $routeName, $parent_id = 0 )
    {   
        $repository = $this->getDoctrine()->getRepository(Menu::class);
        $menus = $repository->findAllGreaterThanStatus(1, $parent_id);

        $arr = array_filter($menus,function($k) use ($parent_id) {
            return $k['parent_id'] == $parent_id;
        });

        $menu = '';
        $menu .= '<ul class="main-navigation">';
            foreach ($arr as $key => $m) {
                $class = ($routeName == $m['routename']) ? "active" : "";
                $menu .= '<li class="' . $class . '">'; 
                $menu .= '<a href="' . $m['link'] . '">' . $m['m_name'] . '</a>';
                $menu .= '</li>';
            }
        $menu .= '</ul>';

        echo $menu;
    }

    public function getPageName($pagename)
    {
        $arr = explode("||", $pagename);
        $page_name = "";

        if($arr[1] == "page"){
            $repository = $this->getDoctrine()->getRepository(Menu::class);
            $menus = $repository->findBy(
                ['routename' => $arr[0]]
            );

            foreach ($menus as $key => $m) {
                $page_name = $m->getMenuName();
            }

        }elseif($arr[1] == "category"){
            $page_name = ucfirst($arr[0]);
        }else{
            $page_name = "Magalati";
        }

        echo $page_name;
    }
    
}