<?php

namespace App\Controller\Admin;

use App\Entity\Fourniture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FournitureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fourniture::class;
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
