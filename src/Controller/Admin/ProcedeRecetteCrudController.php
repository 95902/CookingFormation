<?php

namespace App\Controller\Admin;

use App\Entity\ProcedeRecette;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProcedeRecetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProcedeRecette::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
  
            TextField::new('titre_recette'),
            CollectionField::new('etape1'),
            CollectionField::new('etape2'),
            CollectionField::new('etape3'),
        ];
    }
    
}
