<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Formation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/nos-formations/{id}", name="app_formations")
     */
    public function index(Category $categorie): Response
    {
        $categories = $this->entityManager->getRepository(Category::class)->findALL();
        // $formations = $this->entityManager->getRepository(Formation::class)->findALL();
        $formations = $categorie->getFormations();
        return $this->render('formation/index.html.twig',[
            'formations'=>$formations,
            'categories'=>$categorie,
            'Menucategories'=>$categories
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
    // /**
    //  * @Route("/nos-formations/{id}", name="app_formations/{categorie}")
    //  */
    // public function showProductsAction($categoryId)
    // {
    //     $category = $this->entityManager
    //         ->getRepository(Category::class)
    //         ->find($categoryId);
    //     // dd($category);
    //         return  $category->getFormations();

    // }
}
