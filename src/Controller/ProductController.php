<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController{
    #[Route('/product', name: 'create_product')]
    public function createProduct(EntityManagerInterface $entityManager): Response
    {
        $product = new Product();
        $product->setName('Teclado');
        $product->setPrice(12);
        $product->setDescription('Teclado inalambrico bluetooth, robusto y estilizado.');

        $entityManager->persist($product);
        $entityManager->flush();

        

        return new Response('Se ha creado un nuevo producto '.$product->getName(). ', con la id '.$product->getId());
    }

    #[Route('/product/{id}', name: 'product_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'Nol se encuentra ningun producto con el id: '.$id
            );
        }

        return new Response('Mira el producto seleccionado: '.$product->getName());
    }

    public function update(EntityManagerInterface $entityManager, int $id): Response
    {
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No se encuentra el poducto para esa id '.$id
            );
        }

        $product->setName('Nuevo nombre para el producto: ');
        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }

    public function delete(EntityManagerInterface $entityManager, int $id): Response
    {
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No se encuentra el producto para esa id '.$id
            );
        }

        $entityManager->remove($product);
        $entityManager->flush();

        return new Response('Se ha eliminado el producto con la id: '.$id);
    }
}
