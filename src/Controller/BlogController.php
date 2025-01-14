<?php
// src/Controller/BlogController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/blog', requirements: ['_locale' => 'en|es|fr'], name: 'blog_')]
class BlogController extends AbstractController
{

    #[Route('/{_locale}', name: 'index')]
    public function index(): Response
    {
        // ...
    }

    #[Route('/{_locale}/posts/{slug}', name: 'show')]
    public function show(string $slug): Response
    {
        // ...
    }

    #[Route('/blog/{page<\d+>?1]}',//se le asigna un requisito a la variable page, mediante uina expresión regular
    name: 'blog_list', 
    methods:['GET'])]//se le asigna un nombre de ruta y se límita el uso al método GET 
    public function list(Request $request): Response
    {
        $routeName = $request->attributes->get('_route');
        $routeParameters = $request->attributes->get('_route_params');
        $allAttributes = $request->attributes->all();

        // ...
    }

    #[Route('/blog/{slug}',
    name: 'blog_show',
    priority: 2)]
    public function slug(string $slug): Response
    {
        // ...
    }

   

}