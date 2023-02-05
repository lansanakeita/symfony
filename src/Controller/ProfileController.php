<?php

namespace App\Controller;

use App\Entity\Lyceen;
use App\Repository\AtelierRepository;
use App\Repository\LyceenRepository;
use App\Repository\LyceeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reponses;
use App\Form\ReponseLyceenType;
use App\Repository\EditionParticipationRepository;
use App\Repository\QuestionsRepository;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

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

    #[Route('/questionnaire', name: 'app_questionnaire')]
    public function formulaireSatisfaction(
        Request $request,
        QuestionsRepository $questionsRepository,
        EditionParticipationRepository $repository,
        EntityManagerInterface $entityManager
    ): Response {
        $reponse = new Reponses();
        $form = $this->createForm(ReponseLyceenType::class, $reponse);
        $form->handleRequest($request);

        $questions = $questionsRepository->findAll();

        if ($form->isSubmitted()) {
            $lyceen = new Lyceen();
            $reponse->addLyceen($this->getUser());
            $reponse->setDateReponse(new DateTime());
            $entityManager->persist($reponse);
            $entityManager->flush();
        }

        return $this->render('questionnaire/questionnaire.html.twig', [
            'form' => $form->createView(),
            'questions' => $questions,
        ]);
    }
}
