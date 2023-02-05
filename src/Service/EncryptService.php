<?php

namespace App\Service;

use App\Repository\AtelierRepository;
use App\Repository\LyceenRepository;
use App\Repository\SalleRepository;
use App\Repository\UserRepository;


class EncryptService
{
 
    private $lyceenRepository;
    private $atelierRepository;
    private $salleRepository;

    public function __construct(
        LyceenRepository $lyceenRepository,
        AtelierRepository $atelierRepository,
        SalleRepository $salleRepository
    )
    {

         $this->lyceenRepository = $lyceenRepository;
         $this->atelierRepository = $atelierRepository;
         $this->salleRepository = $salleRepository;

        // parent::__construct();
    }

    public function EncryptData(){
        $data = $this->lyceenRepository->findAll();

        foreach ($data as $user) {
            $user->setLastName(hash('md5', $user->getLastName()));
            $user->setFirstName(hash('md5', $user->getFirstName()));
            $user->setPhone(hash('md5', $user->getPhone()));
            $user->setEmail(hash('md5', $user->getEmail()));
    
            $this->lyceenRepository->save($user, true);
        }
    }

    public function assignRooms(){
        $ateliersInscrits = $this->atelierRepository->inscritParAtelierPourLeForum();
        $salles = $this->salleRepository->findAll();

        // trie des salles par leur capacité
        usort($salles, function ($salle1, $salle2) {
            return $salle1->getCapicite() <=> $salle2->getCapicite();
        });

            foreach ($ateliersInscrits as $atelier) {
                $nbreInscritDansAtelier = $atelier["nb_inscrit"];

                // chercher la salle ayant une capacité suffisante
                $assignedRoom = NULL;
                foreach ($salles as $salle) {
                    if ($salle->getCapicite() >= $nbreInscritDansAtelier) {
                        $assignedRoom = $salle;
                        break;
                    }
                }

                // si aucune salle n'a été trouvée, on lui attribut la plus grande salle
                if (!$assignedRoom) {
                    $assignedRoom = end($salles);
                }
        

                $atelierToAssigned = $this->atelierRepository
                                          ->findBy(['nomAtelier' => $atelier["nom_atelier"]])[0];
                $atelierToAssigned->setSalle($assignedRoom);
                //$singleAtelier->setSalle($assignedRoom);
                $this->atelierRepository->save($atelierToAssigned, true);
            }
    }
    
}


?>