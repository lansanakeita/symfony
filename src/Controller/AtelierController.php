<?php

namespace App\Controller;

use App\Entity\Atelier;
use App\Entity\Participation;
use App\Form\AtelierFormType;
use App\Form\DesinscriptionFormType;
use App\Form\ParticiperFormType;
use App\Repository\AtelierRepository;
use App\Repository\LyceenRepository;
use App\Repository\ParticipationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class AtelierController extends AbstractController
{

    #[Route('/list_atelier', name: 'app_list_atelier')]
    public function listAteliers(AtelierRepository $atelierRepository): Response
    {
        $ateliers = $atelierRepository->findAll();
       //dd($ateliers);
        return $this->render('atelier/list.html.twig', [
            'ateliers' => $ateliers, 
        ]);
    }

    #[Route('api/ateliers', name: 'app_get_ateliers', methods:['GET','HEAD'])]
    public function allAteliers(AtelierRepository $repository): JsonResponse
    {
        $ateliers = $repository->findAll();
        return new JsonResponse($ateliers);
    }


    #[Route('/detail_atelier/{id}', name: 'app_detail_atelier')]
    public function detailAtelier(
        Request $request,
                $id,
        AtelierRepository $atelierRepository,
        EntityManagerInterface $entityManager
    )
    {
        $atelier = $atelierRepository->find($id);
        $ateliers = $atelierRepository->findAll();

        //traitement avec le bouton participation
        $form = $this->createForm(ParticiperFormType::class, $this->getUser());
        $form->handleRequest($request);


        if ($form->isSubmitted()) {
            $this->getUser()->addAtelier($atelier);
            $entityManager->persist($this->getUser());
            $entityManager->flush();
            $this->addFlash('success', 'Inscription effectué avec succès');
        }

        $form_desinscrire = $this->createForm(DesinscriptionFormType::class, $this->getUser());
        $form_desinscrire->handleRequest($request);

        if ($form_desinscrire->isSubmitted()){
            $this->getUser()->removeAtelier($atelier);
            $entityManager->persist($this->getUser());
            $entityManager->flush();
            $this->addFlash('success', 'Désinscription réussie');
            return $this->redirectToRoute('app_list_atelier');
        }

        return $this->render('atelier/detail.html.twig', [
            'atelier' => $atelier,
            'ateliers' => $ateliers,
            'form' => $form->createView(),
            'form_desinscrire' => $form_desinscrire->createView(),
        ]);
    }


   
}
