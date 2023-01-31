<?php

namespace App\Controller\Admin;

use App\Entity\Activite;
use App\Entity\Atelier;
use App\Entity\Competence;
use App\Entity\EditionParticipation;
use App\Entity\Intervenant;
use App\Entity\Lycee;
use App\Entity\Lyceen;
use App\Entity\Metier;
use App\Entity\Participation;
use App\Entity\Question;
use App\Entity\Questionnaire;
use App\Entity\Reponse;
use App\Entity\ReponsePossible;
use App\Entity\Salle;
use App\Entity\Secteur;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

       return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Forum');
    }

    public function configureMenuItems(): iterable
    {
        
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Activites', 'fas fa-globe', Activite::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Salle', 'fas fa-list', Salle::class);
        yield MenuItem::linkToCrud('Réponse_Possibles', 'fas fa-list', ReponsePossible::class);
        yield MenuItem::linkToCrud('Secteurs', 'fas fa-list', Secteur::class);
        yield MenuItem::linkToCrud('Atelier', 'fas fa-list', Atelier::class);
    }
}