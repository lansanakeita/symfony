<?php

namespace App\Controller\Admin;

use App\Entity\Atelier;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AtelierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Atelier::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomAtelier'),
            AssociationField::new('salle'),
            AssociationField::new('secteur'),
            AssociationField::new('metier'),
            AssociationField::new('intervenant'),
            AssociationField::new('lyceen'),
            DateTimeField::new('dateAtelier'),
        ];
    }
    
}
