<?php

namespace App\Controller\Admin;

use App\Entity\Lyceen;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LyceenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lyceen::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
