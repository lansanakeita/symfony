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


    #[Route('/atelier', name: 'app_atelier')]
    public function index(
        Atelier $atelier = null,
        Request $request,
        EntityManagerInterface $entityManager
    )
    {
        if (!$atelier){
            $atelier = new Atelier();
        }

        $form = $this->createForm(AtelierFormType::class, $atelier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($atelier);
            $entityManager->flush();
        }

        return $this->render('atelier/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/list_atelier', name: 'app_list_atelier')]
    public function listAteliers(AtelierRepository $atelierRepository): Response
    {
        $ateliers = $atelierRepository->findAll();
       //dd($ateliers);
        return $this->render('atelier/list.html.twig', [
            'ateliers' => $ateliers,
        ]);
    }
}
