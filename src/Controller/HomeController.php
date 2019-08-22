<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Form\MenuType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Menu::class);
        $menus = $repository->findAllGreaterThanStatus(1);

        dump($menus);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'menus'           => $menus
        ]);
    }
}
