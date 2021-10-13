<?php

namespace App\Classe;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class Cart{
    private $session;
    private $entityManager;
    
    public function __construct(RequestStack $requestStack, EntityManagerInterface $entityManager)
    {
        $this->session = $requestStack;
        $this->entityManager = $entityManager;
    }

    public function add($id){
        $cart = $this->session->getSession()->get('cart');
        // $cart =  [];
        // $this->session->getSession()->set('cart', $cart);
        if(is_array($cart)){
            if(array_key_exists($id, $cart)){
                $cart[$id] += 1;
            }else{
                $cart += [$id=>1];
            }
        }else{
            $cart += [$id=>1];
        }
        $this->session->getSession()->set('cart', $cart);
    }

    public function get(){
        return $this->session->getSession()->get('cart');
    }

    public function remove(){
        return $this->session->getSession()->remove('cart');
    }
    public function getFull(){
        $cartComplete = [];
        foreach($this->get() as $id =>$quantity)
        {
            $product_object = $this->entityManager->getRepository(Product::class)->findOneBy(["id"=>$id]);
            if(!$product_object){
                $this->remove($id);
                continue;
            }else
            {
                $cartComplete[]=[
                "product"=>$product_object, 
                'quantity'=>$quantity
                ];
            }
        }
        return $cartComplete;
    }
}