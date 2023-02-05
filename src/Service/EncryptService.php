<?php

namespace App\Service;
use App\Repository\LyceenRepository;
use App\Repository\UserRepository;


class EncryptService
{
 
    private $repository;

    public function __construct(LyceenRepository $repository){

         $this->repository = $repository;

        // parent::__construct();
    }

    public function EncryptData(){
        $data = $this->repository->findAll();

        foreach ($data as $user) {
            $user->setLastName(hash('md5', $user->getLastName()));
            $user->setFirstName(hash('md5', $user->getFirstName()));
            $user->setPhone(hash('md5', $user->getPhone()));
            $user->setEmail(hash('md5', $user->getEmail()));
    
            $this->repository->save($user, true);
        }


    }
    
}


?>