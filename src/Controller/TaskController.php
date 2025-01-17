<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Form\Extension\Core\Type\DateType;
// use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class TaskController extends AbstractController
{
    // public function new(Request $request): Response
    // {
        
    //     // creates a task object and initializes some data for this example
    //     $task = new Task();
    //     $task->setTask('Write a blog post');
    //     $task->setDueDate(new \DateTimeImmutable('tomorrow'));

    //     $form = $this->createFormBuilder($task)
    //         ->add('task', TextType::class)
    //         ->add('dueDate', DateType::class)
    //         ->add('save', SubmitType::class, ['label' => 'Create Task'])
    //         ->getForm();

    //     return $this->render('task/index.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }
    #[Route('/task', name: 'task_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // just set up a fresh $task object (remove the example data)
        $task = new Task();
        $task = new Task();

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
            // ... perform some action, such as saving the task to the database
            //hay que salvar la tarea en la base de datos
            // for example, if Task is a Doctrine entity, save it!
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('task_new');
        }

        return $this->render('task/index.html.twig', [
            'form' => $form,
        ]);
    }
}