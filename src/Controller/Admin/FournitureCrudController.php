<?php

namespace App\Controller\Admin;

use App\Entity\Fourniture;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FournitureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fourniture::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            NumberField::new('prix_depart')->onlyOnIndex(),
            NumberField::new('prix_depart')->onlyWhenCreating(),
            NumberField::new('prix_actuel'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }
}
