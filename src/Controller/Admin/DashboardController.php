<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\ContenueFormation;
use App\Entity\DetailsFormation;
use App\Entity\Formation;
use App\Entity\Objectif;
use App\Entity\Prerequis;
use App\Entity\ProcedeRecette;
use App\Entity\Recette;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('CookingFormation');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Category::class);
        yield MenuItem::subMenu('Formation ','fas fa-book-open')->setSubItems([
            MenuItem::linkToCrud('Formation', 'fas fa-book-open', Formation::class),
            MenuItem::linkToCrud('Objectif', 'fas fa-bullseye', Objectif::class),
            MenuItem::linkToCrud('Détails formations', 'fas fa-x-ray', DetailsFormation::class),
            MenuItem::linkToCrud('Prérequis', 'fas fa-business-time', Prerequis::class),
            MenuItem::linkToCrud('Contenue', 'fas fa-book', ContenueFormation::class),

        ]);
        yield MenuItem::subMenu('Recette ','fas fa-bread-slice')->setSubItems([
            MenuItem::linkToCrud('Recette', 'fas fa-bread-slice', Recette::class),
            MenuItem::linkToCrud('Objectif', 'fas fa-clipboard-list', ProcedeRecette::class),
        ]);
       
    }
}
