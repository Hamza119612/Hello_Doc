<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Spcialite;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class DashboardController extends AbstractDashboardController
{
    /**
     * 
     * @Route("/admin", name="admin_index")
     */ 
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hello Doc');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa-home'),

            MenuItem::linkToCrud('Spcialite', 'fa fa-tags', Spcialite::class),
            MenuItem::linkToCrud('User', 'fa fa-tags', User::class),

          
        ];
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
}
