<?php

namespace App\Controller\Admin;

use App\Entity\EditionParticipation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class EditionParticipationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EditionParticipation::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('year'),
            AssociationField::new('question'),
        ];
    }
    
}
