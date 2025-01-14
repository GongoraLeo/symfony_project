<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number')] //la ruta se define como atributo, se pueden poner en archivos separados
    public function number(): Response
    {
        $number = random_int(0, 1000);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);

    }
}