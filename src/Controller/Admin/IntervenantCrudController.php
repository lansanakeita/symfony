<?php

namespace App\Controller\Admin;

use App\Entity\Intervenant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IntervenantCrudController extends UserCrudController
{
    public static function getEntityFqcn(): string
    {
        return Intervenant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return array_merge(parent::configureFields($pageName), [
            TextField::new('company'),
        ]);
    }
    
}
