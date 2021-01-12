<?php

namespace App\Controller\Admin;

use App\Entity\Currency;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(ProductCrudController::class)->generateUrl());
    }

    // ...    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Simple Project Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::linkToCrud('Products', 'fa fa-shop', Product::class),
            MenuItem::linkToCrud('Currencies', 'fa fa-money', Currency::class),

        ];        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
