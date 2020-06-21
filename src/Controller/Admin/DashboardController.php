<?php

namespace App\Controller\Admin;
<<<<<<< HEAD
=======
use App\Entity\Specialite;
>>>>>>> 76f88b131c60ff7e61c9881eb12f9fa869e9f893

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< HEAD
use App\Entity\Specialite;
=======
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

>>>>>>> 76f88b131c60ff7e61c9881eb12f9fa869e9f893

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin_index")
<<<<<<< HEAD
     */ 
=======
     */
>>>>>>> 76f88b131c60ff7e61c9881eb12f9fa869e9f893
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
<<<<<<< HEAD
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa-home'),

            MenuItem::linkToCrud('Specialite', 'fa fa-tags', Specialite::class),

          
=======
        
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa-home'),

            MenuItem::section('Blog'),
            MenuItem::linkToCrud('Specialite', 'fa fa-tags', Specialite::class)
           

>>>>>>> 76f88b131c60ff7e61c9881eb12f9fa869e9f893
        ];
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
}
