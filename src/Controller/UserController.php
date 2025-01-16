<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController{
    #[Route('/user', name: 'create_user')]
    public function createUser(EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $user->setName('Leonardo');
        $user->setLastName('Gongora');
        $user->setNickName('leon_noel');

        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('Se ha creado un nuevo usuario '.$user->getName(). ', con la id '.$user->getId());
    }

    #[Route('/user/{id}', name: 'user_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No se encuentra el usuario con el id: '.$id
            );
        }

        return new Response('Hemos encontrado al usuario: '.$user->getName());
    }
}
