<?php

namespace App\Controller\Admin;

use App\Entity\Gamme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GammeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gamme::class;
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
