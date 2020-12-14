<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Rendezvous;
use App\Form\UserFormType;
use App\Form\RendesVousType;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

class RendezvousController extends AbstractController
{
    /**
     * @Route("/rendezvous", name="rendezvous")
     */
    public function index(): Response
    {
        $repositoryuser = $this->getDoctrine()->getRepository(User::class);
        $repositoryrdv = $this->getDoctrine()->getRepository(Rendezvous::class);
        $repositorysemaine = $this->getDoctrine()->getRepository(Semaine::class);
        $lesusers = $repositoryuser->findAll();
        $lesrendezvous = $repositoryrdv->findAll();
        $lasemaine = $repositorysemaine->findAll();

        $lesjours = [];
        for ($i = 1; $i <= 8; $i++) {
            $input = 'now + ' . $i . 'days';
            array_push($lesjours, $input);
        }
        $leshoraires = [];
        for ($i = 8; $i <= 11; $i++) {
            array_push($leshoraires, $i);
        }
        for ($i = 14; $i <= 17; $i++) {
            array_push($leshoraires, $i);
        }
        $lesjours2 = [];

        $now   = new DateTime;
        for ($i = 1; $i < 8; $i++) {
            $clone = clone $now;
            $modif = '+' . $i . ' day';
            $clone->modify($modif);
            array_push($lesjours2, $clone);
        }
        /* $lesjh; */

        for ($i = 1; $i < 8; $i++) {
            $clone = clone $now;
            $modif = '+' . $i . ' day';
            $clone->modify($modif);
            foreach ($leshoraires as $heure) {
                $clone2 = clone $clone;
                $clone2->setTime($heure, 0, 0);
                $lesjh[$i][$heure] = $clone2;
            }
        }

        return $this->render('rendezvous/index.html.twig', [
            'lesrendezvous' => $lesrendezvous,
            'lesjours' => $lesjours,
            'lesjh' => $lesjh
        ]);
    }
    // /**
    //  * @Route("/rendezvous/addRendezVous/{jour}/{heur}", name="addRendezVous")
    //  */
    // public function createRendezVous($jour, $heur, UserInterface $user, Request $request, Rendezvous $rdv) //
    // {


    //     // $rdv = new Rendezvous();
    //     ///$rdv->
    //     //dd($rdv);
    //     $nouveaurdv = $this->createForm(RendesVousType::class, $rdv);
    //     dd($nouveaurdv);
    //     // $nouveaurdv->handleRequest($request);
    //     // if ($nouveaurdv->isSubmitted() && $nouveaurdv->isValid()) {
    //     //     $rdv->setHeureAt($jour . " " . $heur);
    //     //     $rdv->setUser($user);
    //     //     $objectManager->persist($rdv);
    //     //     $objectManager->flush();
    //     //     return $this->redirectToRoute("rendezvous");
    //     // }
    // }
    /**
     * @Route("/rendezvous/remove/{id}", name="removeRendezVous")
     */
    public function deleteRendezVous(Rendezvous $rdv)
    {
        $objectManager = $this->getDoctrine()->getManager();

        $objectManager->remove($rdv);
        $objectManager->flush();
        return $this->redirectToRoute("rendezvous");
    }

    /**
     * @Route("/rendezvous/ajout/{id}/{jour}/{heur}", name="ajoutrdv")
     */
    public function ajoutRendezVous($id, $jour, $heur, ObjectManager $objectManager)
    {
        $repositoryuser = $this->getDoctrine()->getRepository(User::class);
        $repositoryrdv = $this->getDoctrine()->getRepository(Rendezvous::class);
        $user = $repositoryuser->find($id);
        $lesrendezvous = $repositoryrdv->findAll();
        $input = $jour . " " . $heur . ":00:00";
        $date4 = DateTime::createFromFormat('Y-m-d H:i:s', $input);

        $rendezvous = new Rendezvous();
        $rendezvous->setHeureAt($date4);
        $rendezvous->setUser($user);
        $objectManager->persist($rendezvous);
        $objectManager->flush();
        return $this->redirectToRoute("rendezvous");
    }
    /**
     * @Route("/rendezvous/ajout2/{id}/{date}", name="ajoutrdv2")
     */
    public function ajoutRendezVous2($id, $date, ObjectManager $objectManager)
    {
        $repositoryuser = $this->getDoctrine()->getRepository(User::class);
        $repositoryrdv = $this->getDoctrine()->getRepository(Rendezvous::class);
        $user = $repositoryuser->find($id);
        $lesrendezvous = $repositoryrdv->findAll();
        $input = $date . ":00:00";
        $date2 = DateTime::createFromFormat('Y-m-d H:i:s', $input);
        $rendezvous = new Rendezvous();
        $rendezvous->setHeureAt($date2);
        $rendezvous->setUser($user);
        $objectManager->persist($rendezvous);
        $objectManager->flush();
        return $this->redirectToRoute("rendezvous");
    }
}
