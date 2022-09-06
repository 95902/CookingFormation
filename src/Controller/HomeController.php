<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {

        $categories = $this->entityManager->getRepository(Category::class)->findALL();

  
        return $this->render('home/index.html.twig', [
            'Menucategories' =>  $categories
        ]);
    }

    //   /**
    //  * @Route("/nos-formations/{id}", name="app_formations")
    //  */
    // public function showArticleByCategory(Category $categorie): Response
    // {

    //     // $categories = $this->entityManager->getRepository(Category::class)->findALL();

    //     $formations = $categorie->getFormations() ;
    //     // if (condition) {
    //     //     # code...
    //     // }

    //     // dd( $formations);


    //     return $this->render('formation/index.html.twig');
    // }
}
