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

    /**
     * @Route("/coiffure/autre/creation", name="creation")
     */

    public function creation()
    {
        return $this->render('coiffure/autre/creation.html.twig');
    }

    /**
     * @Route("/coiffure/autre/quiSommeNous", name="quiSommeNous")
     */

    public function quiSommeNous()
    {
        return $this->render('coiffure/autre/quiSommeNous.html.twig');
    }

    /**
     * @Route("/coiffure/autre/actualites", name="actualites")
     */

    public function actualites()
    {
        return $this->render('coiffure/autre/actualites.html.twig');
    }

    /**
     * @Route("/coiffure/Books/coupeEnfant", name="coupeEnfant")
     */

    public function coupeEnfant()
    {
        return $this->render('coiffure/Books/coupeEnfant.html.twig');
    }

     /**
     * @Route("/coiffure/Books/coupeFemme", name="coupeFemme")
     */

    public function coupeFemme()
    {
        return $this->render('coiffure/Books/coupeFemme.html.twig');
    }

    /**
     * @Route("/coiffure/Books/coupeHomme", name="coupeHomme")
     */

    public function coupeHomme()
    {
        return $this->render('coiffure/Books/coupeHomme.html.twig');
    }

    /**
     * @Route("/coiffure/Tarifs/tarifsStandars", name="tarifsStandars")
     */

    public function tarifsStandars()
    {
        return $this->render('coiffure/Tarifs/tarifsStandars.html.twig');
    }

    /**
     * @Route("/coiffure/Tarifs/Produits", name="Produits")
     */

    public function Produits()
    {
        return $this->render('coiffure/Tarifs/Produits.html.twig');
    }

}
