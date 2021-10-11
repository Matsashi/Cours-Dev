<?php

namespace App\Controller;

use App\Classe\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(Cart $cart): Response
    {
        dd($cart->get());
        return $this->render('cart/index.html.twig');
    }
    /**
     * @Route("/cart/add/{id}", name="add_to_cart")
     */
    public function add($id, Cart $cart){
        $cart->add($id);
        return $this->redirectToRoute('cart');
    }

    public function remove($id, Cart $cart){
        $cart->remove($id);
        return $this->render('product/index.html.twig');
    }
}
