<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Product;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    public function index(Request $request, Search $search): Response
    {
        $form = $this->createForm(SearchType::class,$search);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $products = $this->entityManager->getRepository(Product::class)->findWithSearch($search);
        }else{
            $products = $this->entityManager->getRepository(Product::class)->findAll();
        }        
        return $this->render('product/index.html.twig', [
            'allProducts' => $products,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/product/{slug}", name="product")
     */

    public function show($slug)
    {
        $product = $this->entityManager->getRepository(Product::class)->findOneBy(["Slug"=>$slug]);
        if(!$product){
            return $this->redirectToRoute("products");
        }
            return $this->render('product/show.html.twig', [
            "product"=>$product
        ]);
    }
    
}
