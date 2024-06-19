<?php

namespace App\Controller\Admin;

use App\Entity\Disque;
use App\Entity\Produit;
use Doctrine\ORM\Mapping\Entity;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use phpDocumentor\Reflection\Types\Integer;

class DisqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Disque::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('subtitle'),
            TextareaField::new('description'),
            NumberField::new('price'),
            ImageField::new('image')
                ->setBasePath('images/')
                ->setUploadDir('public/images/imgDisc')
                ->setRequired($pageName !== Crud::PAGE_EDIT)
                ->setFormTypeOptions($pageName !== Crud::PAGE_EDIT ? ['allow_delete' => false] : []),
            IntegerField::new('quantity'),

    
    
            AssociationField::new('artiste'),
            AssociationField::new('genre'),
        ];
    }
}
