<?php

namespace App\Controller\Admin;

use App\Entity\Lyceen;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LyceenCrudController extends UserCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lyceen::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return array_merge(parent::configureFields($pageName), [
            AssociationField::new('lycee'),
            AssociationField::new('section'),
        ]);
    }
}
