<?php

namespace App\Controller\Admin;

use App\Entity\Actualites;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
class ActualitesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualites::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titreactualite'),
            TextEditorField::new('contenue')->hideOnIndex()->setFormType(CKEditorType::class),
            SlugField::new('slug')->setTargetFieldName('titreactualite'),
            DateField::new('date'),
        ]
        ;
    }
    public function configureCrud(Crud $crud): Crud
{
    return $crud
        ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
    ;
}
   
}
