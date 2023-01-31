<?php

namespace App\Controller\Admin;

use App\Entity\ReponsePossible;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReponsePossibleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ReponsePossible::class;
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
