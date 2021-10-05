<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/product", name="products")
     */

    public function index(): Response
    {
        $products = $this->entityManager->getRepository(Product::class)->findAll();
        return $this->render('product/index.html.twig', [
            'allProducts' => $products,
        ]);
    }

    /**
     * @Route("/product/{slug}", name="product")
     */

    public function show($slug)
    {
        // $slugTest = ["slug"=>$slug];
        // dd($slugTest);
        // dd(["slug"=>$slug]);
        $product = $this->entityManager->getRepository(Product::class)->findOneBy(["Slug"=>$slug]);
        if(!$product){
            return $this->redirectToRoute("products");
        }
            return $this->render('product/show.html.twig', [
            "product"=>$product
        ]);
    }
    
}
