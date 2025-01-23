<?php

namespace App\Controller\Admin;

use App\Controller\Admin\CategoriaCrudController;
use App\Controller\Admin\TareasCrudController;
use App\Controller\Admin\UsuarioCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Usuario;
use App\Entity\Tareas;
use App\Entity\Categoria;

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

        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UsuarioCrudController::class)->generateUrl());
        return $this->redirect($routeBuilder->setController(UsuarioCrudController::class)->generateUrl());
        
        $adminUrlGenerator2 = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator2->setController(TareasCrudController::class)->generateUrl());
        return $this->redirect($routeBuilder2->setController(TareasCrudController::class)->generateUrl());

        $adminUrlGenerator3 = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator3->setController(CategoriaCrudController::class)->generateUrl());
        return $this->redirect($routeBuilder3->setController(CategoriaCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Project Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Usuarios', 'fas fa-users', Usuario::class);
        yield MenuItem::linkToCrud('Tareas', 'fas fa-tasks', Tareas::class);
        yield MenuItem::linkToCrud('Categorias', 'fas fa-list', Categoria::class);

        yield MenuItem::linkToRoute('Volver a la app', 'fas fa-home', 'homepage');

        
    }
}
