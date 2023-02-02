<?php

namespace App\Controller;

use App\Repository\AtelierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(AtelierRepository $atelierRepository): Response
    {
        $ateliers = $atelierRepository->findAll();
        return $this->render('home/index.html.twig', [
            'ateliers' => $ateliers,
        ]);
    }
}
