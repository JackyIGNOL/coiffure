<?php

namespace App\Controller;

use App\Entity\Semaine;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SemaineController extends AbstractController
{
    /**
     * @Route("/semaine", name="semaine")
     */
    public function index(): Response
    {
        $repositorysemaine = $this->getDoctrine()->getRepository(Semaine::class);
        $lasemaine = $repositorysemaine->findAll();
        $leshoraires = [];
        for ($i = 1; $i <= 24; $i++) {
            array_push($leshoraires, $i);
        }
        return $this->render('semaine/index.html.twig', [
            'controller_name' => 'SemaineController',
            'lasemaine' => $lasemaine,
            'leshoraires' => $leshoraires,
        ]);
    }
    /**
     * @Route("/semaine/ajout/{jour}/{heure}", name="ajoutheure")
     */
    public function ajoutheure(String $jour, int $heure, ObjectManager $objectManager)
    {
        $repositorysemaine = $this->getDoctrine()->getRepository(Semaine::class);
        $lejour = $repositorysemaine->find($jour);
        $horaire = $lejour->getHoraire();
        array_push($horaire, $heure);

        $objectManager->persist($lejour);
        $objectManager->flush();
        return $this->redirectToRoute("semaine");
    }
}
