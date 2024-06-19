<?php

namespace App\Controller\Admin;

use App\Entity\TopSong;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class TopSongCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TopSong::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            UrlField::new('file')->setLabel('Song File'),

        ];
    }

}
