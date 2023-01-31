<?php

namespace App\Controller\Admin;

use App\Entity\Questionnaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class QuestionnaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Questionnaire::class;
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
