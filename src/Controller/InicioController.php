<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InicioController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $user = $this->getUser();

        //hay que redireccionar a la pagina de login de usuario app_login
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }else{
            return $this->render('inicio/index.html.twig');
        }

        
        // return $this->render('inicio/index.html.twig');
    }
}
