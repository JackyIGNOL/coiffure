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
    public function ajoutheure($jour, $heure, ObjectManager $objectManager)
    {
        $repositorysemaine = $this->getDoctrine()->getRepository(Semaine::class);
        /* dd($repositorysemaine); */
        $lejour = $repositorysemaine->find($jour);
        $lejour2 = $repositorysemaine->findAll();
        /* $lejour3 = $repositorysemaine->findBy(array($jour)); */



        foreach ($lejour2 as $jour2) {
            if ($jour2->getJour() == $jour) {
                if ($jour2->getHoraire() == null) {
                    $leshoraires = [];
                    /* dd($jour2, $leshoraires); */
                } else {
                    $leshoraires = $jour2->getHoraire();
                }
                array_push($leshoraires, $heure);
                $jour2->setHoraire($leshoraires);
                /* dd($lejour2, $jour, $jour2, $leshoraires); */
                /* array_push($horaire, $heure); */
                $objectManager->persist($jour2);
                $objectManager->flush();
            }
        }
        /* 
        dd($lejour, $lejour2, $jour, $heure);
        $horaire = $lejour->getHoraire();
        array_push($horaire, $heure);
        $lejour->setHoraire($horaire);
        $objectManager->persist($lejour);
        $objectManager->flush(); */
        return $this->redirectToRoute("semaine");
    }
}
