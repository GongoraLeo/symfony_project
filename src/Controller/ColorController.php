<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ColorController extends AbstractController{
    #[Route('/lucky/color', name: 'lucky_color')]
    public function index(): Response
    {
        $color = ['rojo', 'verde', 'azul', 'amarillo', 'negro', 'blanco'];
        $coloralea = $color[array_rand($color)];
        return $this->render('lucky/color.html.twig', [
            'color' => $coloralea,
        ]);
        
    }
}
