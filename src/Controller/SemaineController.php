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
        $lejour2 = $repositorysemaine->findAll();
        foreach ($lejour2 as $jour2) {
            if ($jour2->getJour() == $jour) {
                if ($jour2->getHoraire() == null) {
                    $leshoraires = [];
                } else {
                    $leshoraires = $jour2->getHoraire();
                }
                array_push($leshoraires, $heure);
                $jour2->setHoraire($leshoraires);
                $objectManager->persist($jour2);
                $objectManager->flush();
            }
        }
        return $this->redirectToRoute("semaine");
    }
    /**
     * @Route("/semaine/remove/{jour}/{heure}", name="removeheure")
     */
    public function deleteRendezVous($jour, $heure)
    {
        $objectManager = $this->getDoctrine()->getManager();
        $repositorysemaine = $this->getDoctrine()->getRepository(Semaine::class);
        $lejour2 = $repositorysemaine->findAll();
        foreach ($lejour2 as $jour2) {
            if ($jour2->getJour() == $jour) {
                $leshoraires = $jour2->getHoraire();
                foreach ($leshoraires as $key => $value) {
                    if ($value == $heure) {
                        unset($leshoraires[$key]);
                        $jour2->setHoraire($leshoraires);
                        $objectManager->persist($jour2);
                        $objectManager->flush();
                    }
                }
            }
        }
        return $this->redirectToRoute("semaine");
    }
}
