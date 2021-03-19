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
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Role assignment'),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),

            MenuItem::section('Fournitures'),
            MenuItem::linkToCrud('Fournitures', 'fa fa-user', Fourniture::class),

            MenuItem::section('Gamme'),
            MenuItem::linkToCrud('Gamme', 'fa fa-user', Gamme::class),

            MenuItem::section('Produit'),
            MenuItem::linkToCrud('Produit', 'fa fa-user', Produit::class),

            MenuItem::section('ProduitFourniture'),
            MenuItem::linkToCrud('ProduitFourniture', 'fa fa-user', ProduitFourniture::class),
        ];
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
