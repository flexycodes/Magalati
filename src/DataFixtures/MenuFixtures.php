<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       

        //Home
        $menu = new Menu();

        $menu->setMenuName('Home');
        $menu->setParentId(0);
        $menu->setLink('/');
        $menu->setStatus(1);
        $menu->setSortOrder(1);
        $menu->setRouteName("home");

        $manager->persist($menu);

        //Tech
        $menu = new Menu();

        $menu->setMenuName('Tech');
        $menu->setParentId(0);
        $menu->setLink('/category/tech');
        $menu->setStatus(1);
        $menu->setSortOrder(2);
        $menu->setRouteName("category");

        $manager->persist($menu);

        //Sports
        $menu = new Menu();

        $menu->setMenuName('Sports');
        $menu->setParentId(0);
        $menu->setLink('/category/sports');
        $menu->setStatus(1);
        $menu->setSortOrder(3);
        $menu->setRouteName("category");

        $manager->persist($menu);

        //About us
        $menu = new Menu();

        $menu->setMenuName('About us');
        $menu->setParentId(0);
        $menu->setLink('/about');
        $menu->setStatus(1);
        $menu->setSortOrder(4);
        $menu->setRouteName("about");

        $manager->persist($menu);

        //About us
        $menu = new Menu();

        $menu->setMenuName('Blog');
        $menu->setParentId(0);
        $menu->setLink('/blog');
        $menu->setStatus(1);
        $menu->setSortOrder(5);
        $menu->setRouteName("blog");

        $manager->persist($menu);

        //Contact us
        $menu = new Menu();

        $menu->setMenuName('Contact us');
        $menu->setParentId(0);
        $menu->setLink('/contact');
        $menu->setStatus(1);
        $menu->setSortOrder(6);
        $menu->setRouteName("contact");

        $manager->persist($menu);

        $manager->flush();
    }
}
