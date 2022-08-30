<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\Header;
use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/inscription", name="register")
     */
    public function index(Request $request,UserPasswordHasherInterface  $encoder)
    {


        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $plaintextPassword = "";
            
        //      hash the password (based on the security.yaml config for the $user class)
        // $hashedPassword = $encoder->hashPassword(
        //     $user,
        //     $plaintextPassword
        // );

            $user->setPassword($encoder->hashPassword(
                $user,
                $user->getPassword()
            ));
            $this->entityManager->persist($user);
            $this->entityManager->flush();

        
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),

        ]);
    }
}

