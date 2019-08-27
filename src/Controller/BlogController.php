<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Form\MenuType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Menu::class);
        $menus = $repository->findAllGreaterThanStatus(1);

        return $this->render('pages//blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'menus'           => $menus
        ]);
    }

}
