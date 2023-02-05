<?php

namespace App\Controller;

use App\Entity\Lyceen;
use App\Entity\Reponse;
use App\Form\ReponseLyceenFormType;
use App\Repository\AtelierRepository;
use App\Repository\EditionParticipationRepository;
use App\Repository\LyceenRepository;
use App\Repository\LyceeRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(
        AtelierRepository $repoAtelier,
        LyceenRepository $repoLyceen, 
    ): Response
    {
        $ateliers = $repoAtelier->findAll();
        $lyceens = $repoLyceen->inscritParLycee();
        $inscritParAtelier = $repoAtelier->inscritParAtelierPourLeForum();
        
        return $this->render('profile/index.html.twig', [
            'ateliers' => $ateliers,
            'lyceens' => $lyceens,
            'inscritParAtelier' => $inscritParAtelier, 
        ]);
    }


    /**Traitement du questionnaire */
    #[Route('/questionnaire', name: 'app_questionnaire')]
    public function formulaireSatisfaction(Request $request,QuestionRepository $questionsRepository,
        ReponseRepository $repoReponse,EntityManagerInterface $entityManager): Response 
    {
        $reponse = new Reponse();
        $form = $this->createForm(ReponseLyceenFormType::class, $reponse);
        $form->handleRequest($request);
        $questions = $questionsRepository->findBy(["active" => true]);
        $currentQuestion= null;

        $recupere = $questionsRepository->findAll(); 
        foreach ($recupere as $liste){
            if($liste->getActive()){
                $currentQuestion = $liste;
            } 
        }
        
        if ($form->isSubmitted()) {
            $reponse->addLyceen($this->getUser());
            $reponse->setQuestion($currentQuestion);
            $entityManager->persist($reponse);
            $entityManager->flush();
            $this->addFlash('success', 'Questionnaire envoyé avec succès !!!');
            return $this->redirectToRoute('profile');
        }
        return $this->render('profile/questionnaire.html.twig', [
            'form' => $form->createView(),
            'questions' => $questions,
            'recupere' => $recupere,
            'currentQuestion' => $currentQuestion,
        ]);
    }
}
