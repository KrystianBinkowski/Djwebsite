<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        $DjSet = $this->getDoctrine()
        ->getRepository(Product::class)
        ->findAll($id);

    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    return new Response('Check out this great product: '.$DjSet->getName());

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
   
}
