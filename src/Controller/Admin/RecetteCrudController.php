<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
        
            TextField::new('titre'),
            SlugField::new('slug')->setTargetFieldName('titre'),
            ImageField::new('image')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired('false'),
            TextEditorField::new('resume'),
            CollectionField::new('caracteristique'),
            CollectionField::new('ingredient'),
            TextField::new('astuceduchef'),
            AssociationField::new('procederecette'),
        
        ];
    }
    
}
