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
        $menu->setLink('index.php');
        $menu->setStatus(1);
        $menu->setSortOrder(1);

        $manager->persist($menu);

        $menu = new Menu();

        $menu->setMenuName('Magazine');
        $menu->setParentId(1);
        $menu->setLink('magazine.php');
        $menu->setStatus(1);
        $menu->setSortOrder(1);

        $manager->persist($menu);

        $menu = new Menu();

        $menu->setMenuName('Blog');
        $menu->setParentId(1);
        $menu->setLink('blog.php');
        $menu->setStatus(1);
        $menu->setSortOrder(2);

        $manager->persist($menu);

        //Home
        $menu = new Menu();

        $menu->setMenuName('Post Styles');
        $menu->setParentId(0);
        $menu->setLink('poststyles.php');
        $menu->setStatus(1);
        $menu->setSortOrder(2);

        $manager->persist($menu);

        $menu = new Menu();

        $menu->setMenuName('Grid post');
        $menu->setParentId(4);
        $menu->setLink('grid.php');
        $menu->setStatus(1);
        $menu->setSortOrder(1);

        $manager->persist($menu);

        $menu = new Menu();

        $menu->setMenuName('List post');
        $menu->setParentId(4);
        $menu->setLink('list.php');
        $menu->setStatus(1);
        $menu->setSortOrder(2);

        $manager->persist($menu);

        //About us
        $menu = new Menu();

        $menu->setMenuName('About us');
        $menu->setParentId(0);
        $menu->setLink('about.php');
        $menu->setStatus(1);
        $menu->setSortOrder(3);

        $manager->persist($menu);

        //Contact us
        $menu = new Menu();

        $menu->setMenuName('Contact us');
        $menu->setParentId(0);
        $menu->setLink('contact.php');
        $menu->setStatus(1);
        $menu->setSortOrder(4);

        $manager->persist($menu);

        $manager->flush();
    }
}
