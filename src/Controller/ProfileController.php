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
    public function index(
        AtelierRepository $repoAtelier,
        LyceenRepository $repoLyceen
    ): Response
    {
        $ateliers = $repoAtelier->findAll();
        $lyceens = $repoLyceen->inscritParLycee();
        $inscritParAtelier = $repoAtelier->inscritParAtelierPourLeForum();
        return $this->render('profile/index.html.twig', [
            'ateliers' => $ateliers,
            'lyceens' => $lyceens,
            'inscritParAtelier' => $inscritParAtelier
        ]);
    }
}
