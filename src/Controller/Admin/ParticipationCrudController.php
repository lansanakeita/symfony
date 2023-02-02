<?php

namespace App\Controller\Admin;

use App\Entity\Participation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ParticipationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Participation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('atelier'),
            AssociationField::new('user'),
            // TextField::new('title'),
            // TextEditorField::new('description'),
        ];
    }
    
}
