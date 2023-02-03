<?php

namespace App\Controller;

use App\Repository\AtelierRepository;
use App\Repository\LyceenRepository;
use App\Repository\LyceeRepository;
use App\Repository\ParticipationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(AtelierRepository $repoAtelier, LyceeRepository $repoLycee, LyceenRepository $repoLuyceen): Response
    {
        $lycees = $repoLycee->findAll();

        $lyceens = $repoLuyceen->liste();
        dd($lyceens);
        
        $ateliers = $repoAtelier->findAll();
        return $this->render('profile/index.html.twig', [
            'ateliers' => $ateliers, 
            'lycees' => $lycees
        ]);
    }
}
