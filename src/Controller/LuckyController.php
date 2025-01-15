<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number/{max}')] //la ruta se define como atributo, se pueden poner en archivos separados
    public function number(int $max): Response
    {
        if ($max < 10) { //gestion de errores si max es menor a 10
            throw $this->createNotFoundException('El número no puede ser inferior a 10');
        }

        $number = random_int(0, $max);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);

    }
}