<?php

namespace App\Controller\Admin;

use App\Entity\ProduitFourniture;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProduitFournitureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProduitFourniture::class;
    }

    //*
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new("produit")->onlyOnIndex(),
            TextField::new("fourniture")->onlyOnIndex(),
            NumberField::new("nb_fourniture"),
        ];
    }
    //*/

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }
}
