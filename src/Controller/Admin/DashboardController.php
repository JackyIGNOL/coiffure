<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\User;
use App\Entity\Rendezvous;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $repositoryuser = $this->getDoctrine()->getRepository(User::class);
        $repositoryrdv = $this->getDoctrine()->getRepository(Rendezvous::class);
        $lesusers = $repositoryuser->findAll();
        $lesrendezvous = $repositoryrdv->findAll();


        $leshoraires = [];
        for ($i = 8; $i <= 11; $i++) {
            array_push($leshoraires, $i);
        }
        $now   = new DateTime;
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



        //dd($lesusers,$lesrendezvous);


        // redirect to some CRUD controller
        /* $routeBuilder = $this->get(CrudUrlGenerator::class)->build(); */

        /*  return $this->redirect($routeBuilder->setController(OneOfYourCrudController::class)->generateUrl()); */

        // you can also redirect to different pages depending on the current user
        //if ('jane' === $this->getUser()->getUsername()) {
        //    return $this->redirect('...');
        //}

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('admin\dashboard.html.twig', [
            'lesrendezvous' => $lesrendezvous,
            'lesusers' => $lesusers,
            'lesjh' => $lesjh
        ]);
        /* return parent::index(); */
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Coiffure');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
