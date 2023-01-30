<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SalleController extends AbstractController
{
    #[Route('/salle', name: 'salle')]
    public function index(): Response
    {

        return $this->render('salle/index.twig.html.twig', [

        ]);
        // return $this->json([
        //     'message' => 'Welcome to your new controller!',
        //     'path' => 'src/Controller/SalleController.php',
        // ]);
    }
}
