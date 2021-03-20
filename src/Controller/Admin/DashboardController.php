<?php

namespace App\Controller\Admin;

use App\Entity\Fourniture;
use App\Entity\Gamme;
use App\Entity\Produit;
use App\Entity\ProduitFourniture;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        //return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());

        return $this->render("security/dashboard/dashboard.html.twig");
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('LAG')
            ->disableUrlSignatures();
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Configuration', 'fas fa-wrench'),
            MenuItem::linkToRoute("Home Page", "fa fa-home", "home_page"),

            MenuItem::section('Gestion des rôles'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class),

            MenuItem::section('Gestion des fournitures'),
            MenuItem::linkToCrud('Fournitures', 'fas fa-couch', Fourniture::class),

            MenuItem::section('Gestion des gammes'),
            MenuItem::linkToCrud('Gammes', 'fa fa-user', Gamme::class),

            MenuItem::section('Gestion des produits'),
            MenuItem::linkToCrud('Produits', 'fa fa-user', Produit::class),

            MenuItem::section('Gestion des produits / fournitures'),
            MenuItem::linkToCrud('Produits et fournitures', 'fa fa-user', ProduitFourniture::class),
        ];
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
