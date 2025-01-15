<?php
// src/Controller/BlogController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[Route('/blog', requirements: ['_locale' => 'en|es|fr'], name: 'blog_')]
class BlogController extends AbstractController
{
    
    #[Route('/{_locale}', name: 'index')]
    public function index(Request $request): Response
    {
        $request->isXmlHttpRequest();//devuelve true si la petición es AJAX

        $request->getPreferredLanguage(['en', 'fr']);
    
        // retrieves GET and POST variables
        $request->query->get('page');
        $request->getPayload()->get('page');
    
        // retrieves SERVER variables
        $request->server->get('HTTP_HOST');
    
        // retrieves an instance of UploadedFile identified by foo
        $request->files->get('foo');
    
        // retrieves a COOKIE value
        $request->cookies->get('PHPSESSID');
    
        // retrieves an HTTP request header, with normalized, lowercase keys
        $request->headers->get('host');
        $request->headers->get('content-type');


        $page = $request->query->get('page', 1);
        return print "hola index esta es la página $page";
    }

    #[Route('/{_locale}/posts/{slug}', name: 'show')]
    public function show(string $slug): Response
    {
        return print "hola show";
    }

    #[Route('/blog/{page<\d+>?1]}',//se le asigna un requisito a la variable page, mediante uina expresión regular
    name: 'blog_list', 
    methods:['GET'])]//se le asigna un nombre de ruta y se límita el uso al método GET 
    public function list(Request $request): Response
    {
        $routeName = $request->attributes->get('_route');
        $routeParameters = $request->attributes->get('_route_params');
        $allAttributes = $request->attributes->all();

        // generate a URL with no route arguments
        $signUpPage = $this->generateUrl('sign_up');

        // // generate a URL with route arguments
        // $userProfilePage = $this->generateUrl('user_profile', [
        //    'username' => $user->getUserIdentifier(),
        // ]);

        // generated URLs are "absolute paths" by default. Pass a third optional
        // argument to generate different URLs (e.g. an "absolute URL")
        $signUpPage = $this->generateUrl('sign_up', [], UrlGeneratorInterface::ABSOLUTE_URL);

        // when a route is localized, Symfony uses by default the current request locale
        // pass a different '_locale' value if you want to set the locale explicitly
        $signUpPageInDutch = $this->generateUrl('sign_up', ['_locale' => 'nl']);

        //con cadena de consulta, parametros que no están en la URL
        $urlquery = $this->generateUrl('blog_list', ['page' => 2, 'category' => 'Symfony']);

        // ...
        return print "hola list";
    }

    #[Route('/blog/{slug}',
    name: 'blog_show',
    priority: 2)]
    public function slug(string $slug): Response
    {
        return print "hola slug";
    }

   

}