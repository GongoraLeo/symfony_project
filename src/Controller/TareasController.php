<?php

namespace App\Controller;

use App\Entity\Tareas;
use App\Form\Tareas1Type;
use App\Repository\TareasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/tareas')]
final class TareasController extends AbstractController
{
    #[Route(name: 'app_tareas_index', methods: ['GET'])]
    public function index(TareasRepository $tareasRepository): Response
    {
        return $this->render('tareas/index.html.twig', [
            'tareas' => $tareasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tareas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tarea = new Tareas();
        $form = $this->createForm(Tareas1Type::class, $tarea, [
            'is_edit' => false,
        ]);
        $form->handleRequest($request);
         

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tarea);
            $entityManager->flush();

            return $this->redirectToRoute('app_tareas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tareas/new.html.twig', [
            'tarea' => $tarea,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tareas_show', methods: ['GET'])]
    public function show(Tareas $tarea): Response
    {
        // Recupero el usuario y la categoría asignados a la tarea
        $usuario = $tarea->getUsuario();
        $categoria = $tarea->getCategoria();

        return $this->render('tareas/show.html.twig', [
            'tarea' => $tarea,
            'usuario' => $usuario,
            'categoria' => $categoria,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tareas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tareas $tarea, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Tareas1Type::class, $tarea, [
            'is_edit' => true,
        ]);
        $form->handleRequest($request);
       

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_tareas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tareas/edit.html.twig', [
            'tarea' => $tarea,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tareas_delete', methods: ['POST'])]
    public function delete(Request $request, Tareas $tarea, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tarea->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($tarea);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_tareas_index', [], Response::HTTP_SEE_OTHER);
    }
}
