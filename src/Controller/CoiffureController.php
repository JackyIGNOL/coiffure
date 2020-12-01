<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoiffureController extends AbstractController
{
    /**
     * @Route("/coiffure", name="coiffure")
     */
    public function index(): Response
    {
        return $this->render('coiffure/index.html.twig', [
            'controller_name' => 'CoiffureController',
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render("coiffure/home.html.twig");
    }
}
