<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordFormType;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    #[Route('/profile', name: 'user_profile')]
    public function request(Request $request, UserService $userService, UserPasswordHasherInterface $passwordHasher): Response
    {        
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $new_pwd = $request->get('change_password_form')['plainPassword']['first'];
            $new_pwd_confirm = $request->get('change_password_form')['plainPassword']['second'];

            $hashedPassword = $passwordHasher->hashPassword($user, $new_pwd_confirm);
            $userService->changePassword($user->getId(), $hashedPassword);
            $user->setPassword($new_pwd_confirm);

            return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',            
            'user_email' => $user->getEmail(),            
            'requestForm' => $form->createView(),
            'success' => true
        ]);
        }

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',            
            'user_email' => $user->getEmail(),            
            'requestForm' => $form->createView(),
            'success' => false
        ]);
    }

}
