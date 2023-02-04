<?php

namespace App\Controller;

use App\Repository\AtelierRepository;
use App\Repository\LyceenRepository;
use App\Repository\LyceeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(AtelierRepository $repoAtelier, LyceeRepository $repoLycee, LyceenRepository $repoLyceen): Response
    {
        // $lycees = $repoLycee->findAll();
        $lyceens = $repoLyceen->liste();
        $ateliers = $repoAtelier->findAll();
        // $listeAtelier = $repoAtelier->listeAtelier();
        // dd($listeAtelier);
        return $this->render('profile/index.html.twig', [
            'ateliers' => $ateliers, 
            'lyceens' => $lyceens
        ]);
    }
}
