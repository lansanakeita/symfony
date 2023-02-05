<?php

namespace App\Controller\Admin;

use App\Entity\EditionParticipation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

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
            AssociationField::new('questions'),
            BooleanField::new('active_year')
        ];
    }

}
