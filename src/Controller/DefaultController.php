<?php

namespace App\Controller;

use App\Entity\DjSetEntity;
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
        ->getRepository(DjSetEntity::class)
        ->findAll();
        dump($DjSet);
        
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'DjSet' => $DjSet,
        ]);
    }
}
