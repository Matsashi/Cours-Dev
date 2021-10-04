<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ModifyAccountType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AccountModifyController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/account/modify", name="account_modify")
     */
    public function index(Request $request, UserPasswordHasherInterface $hasher): Response  
    {
        $user1 = $this->getUser();
        $form = $this->createForm(ModifyAccountType::class, $user1);
        $form->handleRequest($request);
        // dd($form->isSubmitted() && $form->isValid());
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            if(!empty($form->get("old_password")->getData())){
                $password = $user->getPassword();
                $validPassword = $hasher->isPasswordValid($user, $form->get("old_password")->getData());
                if($validPassword){
                    $password = $hasher->hashPassword($user, $form->get("new_password")->getData());
                    $user->setPassword($password);
                }
            }
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            // dd($user);  <== dd() pour afficher quelque chose, comme console.log ou var_dump
        }
        return $this->render('account/modify.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
