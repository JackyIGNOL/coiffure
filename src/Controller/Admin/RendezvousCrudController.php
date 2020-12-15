<?php

namespace App\Controller\Admin;

use App\Entity\Rendezvous;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RendezvousCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rendezvous::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
