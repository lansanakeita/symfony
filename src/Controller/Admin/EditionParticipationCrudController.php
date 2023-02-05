<?php

namespace App\Controller\Admin;

use App\Entity\EditionParticipation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EditionParticipationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EditionParticipation::class;
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
