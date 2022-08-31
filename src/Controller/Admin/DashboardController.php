<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\DetailsFormation;
use App\Entity\Formation;
use App\Entity\Objectif;
use App\Entity\Prerequis;
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
        yield MenuItem::linkToCrud('Formation', 'fas fa-book-open', Formation::class);
        yield MenuItem::linkToCrud('Objectif', 'fas fa-bullseye', Objectif::class);
        yield MenuItem::linkToCrud('Détails formations', 'fas fa-x-ray', DetailsFormation::class);
        yield MenuItem::linkToCrud('Prérequis', 'fas fa-business-time', Prerequis::class);
    }
}
