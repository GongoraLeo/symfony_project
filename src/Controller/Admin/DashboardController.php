<?php

namespace App\Controller\Admin;

use App\Entity\Categoria;
use App\Entity\Tareas;
use App\Entity\Usuario;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();
        


        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Project Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        return [
            //
        MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

        // MenuItem::section('Usuarios'),
        //     MenuItem::linkToCrud('Tareas', 'fa fa-task', Tareas::class),
        //     MenuItem::linkToCrud('Usuarios', 'fa fa-user', Usuario::class),
        //     MenuItem::linkToCrud('Crear Usuario', 'fa fa-user', Usuario::class)
        //     ->setAction('new'),
        //     MenuItem::linkToCrud('Mostrar Usuario', 'fa fa-user', Usuario::class)
        //     ->setAction('show'),
        //     MenuItem::linkToCrud('Editar Usuario', 'fa fa-user', Usuario::class)
        //     ->setAction('edit'),
        //     MenuItem::linkToCrud('Borrar Usuario', 'fa fa-user', Usuario::class)
        //     ->setAction('delete'),

        // MenuItem::section('Tareas'),
        //     MenuItem::linkToCrud('Categorias', 'fa fa-category', Categoria::class),
        //     MenuItem::linkToCrud('Crear Categoria', 'fa fa-category', Categoria::class)
        //     ->setAction('new'),
        //     MenuItem::linkToCrud('Mostrar Categorias', 'fa fa-category', Categoria::class)
        //     ->setAction('show'),
        //     MenuItem::linkToCrud('Editar Categoria', 'fa fa-category', Categoria::class)
        //     ->setAction('edit'),
        //     MenuItem::linkToCrud('Borrar Categoria', 'fa fa-category', Categoria::class)
        //     ->setAction('delete'),
        //     MenuItem::linkToCrud('Usuarios', 'fa fa-user', Usuario::class),
        //     MenuItem::linkToCrud('Tareas', 'fa fa-task', Tareas::class),

        // MenuItem::section('Categorias'),
        //     MenuItem::linkToCrud('Categorias', 'fa fa-category', Categoria::class),
        //     MenuItem::linkToCrud('Tareas', 'fa fa-task', Tareas::class),
        //     MenuItem::linkToCrud('Crear Tarea', 'fa fa-task', Tareas::class)
        //     ->setAction('new'),
        //     MenuItem::linkToCrud('Mostrar Tarea', 'fa fa-task', Tareas::class)
        //     ->setAction('show'),
        //     MenuItem::linkToCrud('Editar Tarea', 'fa fa-task', Tareas::class)
        //     ->setAction('edit'),
        //     MenuItem::linkToCrud('Borrar Tarea', 'fa fa-task', Tareas::class)
        //     ->setAction('delete'),
        ];
    }
}
