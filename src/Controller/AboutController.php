<?php

namespace App\Controller;

use App\Entity\DjSetEntity;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        {
            $DjSet = $this->getDoctrine()
            ->getRepository(DjSetEntity::class)
            ->findAll();
            
            
            return $this->render('about/index.html.twig', [
                'controller_name' => 'AboutController',
                'DjSet' => $DjSet,
            ]);
        }
    }
}
