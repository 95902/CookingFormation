<?php

namespace App\Controller\Admin;

use App\Entity\ContenueFormation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContenueFormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContenueFormation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre_formation'),
            CollectionField::new('jour_1'),
            CollectionField::new('jour_2'),
            CollectionField::new('jour_3'),
            CollectionField::new('jour_4'),
            CollectionField::new('jour_5'),
            CollectionField::new('jour_6'),
            CollectionField::new('jour_7'),
        ];
    }
    
}
