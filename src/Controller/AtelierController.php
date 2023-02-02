<?php

namespace App\Controller;

use App\Entity\Atelier;
use App\Form\AtelierFormType;
use App\Repository\AtelierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AtelierController extends AbstractController
{

    #[Route('/list_atelier', name: 'app_list_atelier')]
    public function listAteliers(AtelierRepository $atelierRepository): Response
    {
        $ateliers = $atelierRepository->findAll();
        return $this->render('atelier/list.html.twig', [
            'ateliers' => $ateliers,
        ]);
    }


    #[Route('/detail_atelier/{id}', name: 'app_detail_atelier')]
    public function detailAtelier($id, AtelierRepository $atelierRepository){
        $atelier = $atelierRepository->find($id);
        return $this->render('atelier/detail.html.twig', [
            'atelier' => $atelier,
        ]);
    }
}
